<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Encuesta;
use App\EncuestaGeneral;
use App\EncuestaPuntaje;
use App\Exports\LinkExport;
use App\Exports\StatusExport;
use App\Jobs\PDFConsolidados;
use App\Jobs\PDFIntereses;
use App\Persona;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function jobs(Request $request)
    {
        $descargar = false;

        $encuesta = Encuesta::where('id', $request->interes_id)
            ->with('empresa')
            ->first();

        $general =  EncuestaGeneral::where('id', $encuesta['encuesta_general_id'])
            ->with('personas')
            ->first();

        $personas_intereses = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
            ->with('persona')
            ->with('punintereses.carrera')
            ->get();

        $encuesta_temp = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        $personas_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
            ->get();


        if ($personas_intereses->isEmpty() && $personas_temperamentos->isEmpty()) {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
        } else {
            if (!$personas_intereses->isEmpty()) {
                foreach ($personas_intereses as $i) {
                    PDFIntereses::dispatchNow($i['persona'], $i['punintereses'], $encuesta['empresa']['nombre'], $request->hour);
                }

                $descargar = true;
            }

            foreach ($general['personas'] as $p) { //PARA LOS CONSOLIDADOS
                $p_intereses = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
                    ->where('persona_id', $p['id'])
                    ->with('punintereses.carrera.intereses')
                    ->first();

                $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                    ->where('persona_id', $p['id'])
                    ->with('puntemperamentos.formula')
                    ->first();

                if ($p_intereses && $p_temperamentos) {
                    PDFConsolidados::dispatchNow($p, $p_intereses['punintereses'], $p_temperamentos['puntemperamentos'], $encuesta['empresa']['nombre'], $request->hour);
                    $descargar = true;
                }
            }

            if ($descargar) {
                return $this->descargarZip($request->hour);
            } else {
                return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
            }
        }
    }

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
            ->with('punintereses.carrera')
            ->first();

        $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $persona, 'puntajes' => $encuesta['punintereses']));
        return $pdf->download('Reporte-Intereses-' . $persona->nombres . '-' . $persona->apellido_paterno . '.pdf');
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
            return Excel::download(new StatusExport($interes['general']['personas'], $interes['id'], $temperamento_id), 'encuesta.xlsx');
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
