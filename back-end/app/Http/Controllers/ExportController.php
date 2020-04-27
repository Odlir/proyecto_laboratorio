<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Encuesta;
use App\EncuestaPuntaje;
use App\Exports\LinkExport;
use App\Exports\StatusExport;
use App\Jobs\PDF;
use App\Persona;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\QueuesController;
use Illuminate\Support\Facades\Artisan;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->campo == "persona") {
            return response()->download(storage_path("app/public/importar-alumnos.xlsx"));
        } else if ($request->campo == "links") {
            return $this->links($request);
        } else if ($request->campo == "status") {
            return $this->status($request);
        } else if ($request->campo == "pdf") {
            return $this->jobs($request);
        }
    }

    // public function jobs(Request $request)
    // {
    //     $carreras = Carrera::where('estado', 1)->orderBy('nombre', 'asc')
    //         ->get();

    //     $encuesta = Encuesta::where('id', $request->interes_id)
    //         ->with('empresa')
    //         ->first();

    //     $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
    //         ->with('persona')
    //         ->with('puntajes.carrera')
    //         ->get();

    //     if ($personas->isEmpty()) {
    //         return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
    //     } else {
    //         foreach ($personas as $p) {
    //             $content = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $p['persona'], 'puntajes' => $p['puntajes']))->output();

    //             $name = 'PDF-'.$request->hour.'/'. $encuesta['empresa']['nombre'] . '/INTERESES/' . $p['persona']['nombres'] . '-' . $p['persona']['apellido_paterno'] . '.pdf';
    //             \Storage::disk('public')->put($name,  $content);
    //         }

    //         return $this->descargarZip($request->hour);
    //     }
    // }

    public function jobs(Request $request)
    {
        $encuesta = Encuesta::where('id', $request->interes_id)
            ->with('empresa')
            ->first();

        $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
            ->with('persona')
            ->with('puntajes.carrera')
            ->get();

        if ($personas->isEmpty()) {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
        } else {
            foreach ($personas as $p) {
                PDF::dispatchNow($p['persona'], $p['puntajes'], $encuesta['empresa']['nombre'], $request->hour);
            }

            return $this->descargarZip($request->hour);
        }
    }

    // public function jobs(Request $request)
    // {
    //     $encuesta = Encuesta::where('id', $request->interes_id)
    //         ->with('empresa')
    //         ->first();

    //     $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
    //         ->with('persona')
    //         ->with('puntajes.carrera')
    //         ->get();

    //     if ($personas->isEmpty()) {
    //         return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
    //     } else {
    //         foreach ($personas as $p) {
    //             PDF::dispatch($p['persona'], $p['puntajes'], $encuesta['empresa']['nombre'],$request->hour);
    //         }

    //         return $this->descargarZip($request->hour);
    //     }
    // }

    public function descargarZip($hour)
    {
        $zip_file = 'PDF-' . $hour . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $path = storage_path('app/public/PDF-' . $hour);
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();

                $relativePath = substr($filePath, strlen($path));

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        return response()->download($zip_file);
    }


    public function links(Request $request)
    {
        $temperamento_id = '';

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1')
                        ->orderBy('id', 'DESC');
                }]);
            }])
            ->first();

        if ($request->temperamento_id != null) {
            $temperamento = Encuesta::where('id', $request->temperamento_id)
                ->with(['general' => function ($query) {
                    $query->with(['personas' => function ($query) {
                        $query->wherePivot('estado', '1')
                            ->orderBy('id', 'DESC');
                    }]);
                }])
                ->first();
            $temperamento_id = $temperamento['id'];
        }

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        } else {
            return Excel::download(new LinkExport($interes['general']['personas'], $interes['id'], $temperamento_id), 'encuesta.xlsx');
        }
    }

    public function pdf($interes_id, $persona_id)
    {
        $carreras = Carrera::where('estado', 1)->orderBy('nombre', 'asc')
            ->get();

        $persona = Persona::where('id', $persona_id)
            ->first();

        $encuesta = EncuestaPuntaje::where('encuesta_id', $interes_id)
            ->where('persona_id', $persona_id)
            ->with('puntajes.carrera')
            ->first();

        $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $persona, 'puntajes' => $encuesta['puntajes']));
        return $pdf->download('Reporte-Interes-' . $persona->nombres . '-' . $persona->apellido_paterno . '.pdf');
    }

    public function status(Request $request)
    {
        $temperamento_id = '';

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1')
                        ->orderBy('id', 'DESC');
                }]);
            }])
            ->first();

        if ($request->temperamento_id != null) {
            $temperamento = Encuesta::where('id', $request->temperamento_id)
                ->with(['general' => function ($query) {
                    $query->with(['personas' => function ($query) {
                        $query->wherePivot('estado', '1')
                            ->orderBy('id', 'DESC');
                    }]);
                }])
                ->first();

            $temperamento_id = $temperamento['id'];
        }

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        } else {
            return Excel::download(new StatusExport($interes['general']['personas'], $interes['id'],$temperamento_id), 'encuesta.xlsx');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
