<?php

namespace App\Http\Controllers;

use App\Area;
use App\Carrera;
use App\Encuesta;
use App\EncuestaGeneral;
use App\EncuestaPuntaje;
use App\Exports\LinkExport;
use App\Exports\StatusExport;
use App\Exports\StatusInteresesExport;
use App\Jobs\PDFConsolidados;
use App\Jobs\PDFIntereses;
use App\Persona;
use App\Rueda;
use App\Talento;
use App\TendenciaTalento;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use iio\libmergepdf\Merger;

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
        } else if ($request->campo == "intereses") {
            return $this->intereses($request);
        } else if ($request->campo == "reportes") {
            return $this->reportes($request);
        }
    }

    public function reportes(Request $request)
    {
        $show = false;

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        $general =  EncuestaGeneral::where('id', $interes['encuesta_general_id'])
            ->with('personas')
            ->first();

        $temperamento = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        if ($temperamento) {
            $show = true;
        }

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        } else {
            foreach ($general['personas'] as $p) {
                $data_interes = EncuestaPuntaje::where('encuesta_id', $interes['id'])
                    ->where('persona_id', $p->id)
                    ->first();

                $data_temperamento = EncuestaPuntaje::where('encuesta_id', $temperamento['id'])
                    ->where('persona_id', $p->id)
                    ->first();

                if ($data_interes) {
                    $p->status_int = "1"; //COMPLETADO
                } else {
                    $p->status_int = "0"; //PENDIENTE
                }

                if ($data_temperamento) {
                    $p->status_temp = "1"; //COMPLETADO
                } else {
                    $p->status_temp = "0"; //PENDIENTE
                }
            }
        }

        return response()->json([$general['personas'], "show" => $show], 200);
    }

    public function intereses(Request $request)
    {
        $encuesta = Encuesta::where('id', $request->interes_id)
            ->with('empresa')
            ->first();

        $general =  EncuestaGeneral::where('id', $encuesta['encuesta_general_id'])
            ->with('personas')
            ->first();

        $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
            ->with('persona')
            ->with('punintereses.carrera')
            ->with(['puninteresessort' => function ($query) {
                $query->with('carrera');
                $query->orderBy('puntaje', 'DESC');
            }])
            ->get();


        if ($personas->isEmpty()) {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 401);
        } else {
            foreach ($personas as $p) {
                PDFIntereses::dispatchNow($p['persona'], $p['punintereses'], $p['puninteresessort'], $encuesta['empresa']['nombre'], $request->hour);
            }
        }

        Excel::store(new StatusInteresesExport($general['personas'], $encuesta['id']), 'Consolidado-' . $request->hour . '/' . $encuesta['empresa']['nombre'] . '-' . $request->interes_id . '.xlsx', 'local');

        return $this->descargarZip($request->hour);
    }

    public function pdf_consolidado($interes_id, $persona_id)
    {
        $ruedas = Rueda::where('estado', '1')->get();

        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')
            ->get();

        $persona = Persona::where('id', $persona_id)
            ->first();

        $encuesta = Encuesta::where('id', $interes_id)
            ->with('empresa')
            ->first();

        $general =  EncuestaGeneral::where('id', $encuesta['encuesta_general_id'])
            ->with('personas')
            ->first();

        $encuesta_temp = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        $p_intereses = EncuestaPuntaje::where('encuesta_id', $interes_id)
            ->where('persona_id', $persona_id)
            ->with('punintereses.carrera.intereses')
            ->with(['puninteresessort' => function ($query) {
                $query->with('carrera');
                $query->orderBy('puntaje', 'DESC');
            }])
            ->first();

        $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
            ->where('persona_id', $persona_id)
            ->with('puntemperamentos.formula')
            ->with('areatemperamentos')
            ->first();

        $tendencias = TendenciaTalento::all();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();


        $identificador = rand();

        $pdf = \PDF::loadView('consolidado/reporte_consolidados', array('areas' => $areas, 'ruedas' => $ruedas, 'persona' => $persona, 'p_temperamentos' => $p_temperamentos['puntemperamentos'], 'a_temperamentos' => $p_temperamentos['areatemperamentos']))->output();

        $pdf2 = \PDF::loadView('consolidado/talentos1', array('talentos' => $talentos, 'tendencias' => $tendencias))->setPaper('a4', 'landscape')->output();

        $pdf3 = \PDF::loadView('consolidado/talentos2')->output();

        $pdf4 = \PDF::loadView('consolidado/talentos3')->setPaper('a4', 'landscape')->output();

        $pdf5 = \PDF::loadView('consolidado/reporte_consolidados2', array('p_intereses' => $p_intereses['punintereses'], 'p_intereses_sort' => $p_intereses['puninteresessort']))->output();

        $name = $identificador . '/1.pdf';
        $name2 = $identificador . '/2.pdf';
        $name3 = $identificador . '/3.pdf';
        $name4 = $identificador . '/4.pdf';
        $name5 = $identificador . '/5.pdf';

        $ruta = storage_path('app/public/' . $identificador . '/');

        Storage::disk('public')->put($name,  $pdf);
        Storage::disk('public')->put($name2,  $pdf2);
        Storage::disk('public')->put($name3,  $pdf3);
        Storage::disk('public')->put($name4,  $pdf4);
        Storage::disk('public')->put($name5,  $pdf5);

        $merger = new Merger;
        $merger->addIterator([$ruta . '1.pdf', $ruta . '2.pdf', $ruta . '3.pdf', $ruta . '4.pdf', $ruta . '5.pdf']);
        $pdfconsolidado = $merger->merge();

        $consolidado = '/Reporte-Consolidado-' . str_replace(' ', '', $persona->nombres) . str_replace(' ', '', $persona->apellido_paterno) . str_replace(' ', '', $persona->apellido_materno) . '.pdf';

        Storage::disk('public')->put($consolidado,  $pdfconsolidado);

        Storage::deleteDirectory('public/' . $identificador); //BORRO LA CARPETA

        return response()->download(storage_path("app/public/" . $consolidado))->deleteFileAfterSend(true);
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

        $encuesta_temp = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')->get();

        $ruedas = Rueda::where('estado', '1')->get();

        $tendencias = TendenciaTalento::all();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $temperamento_id = "";

        foreach ($general['personas'] as $p) { //PARA LOS CONSOLIDADOS
            $p_intereses = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
                ->where('persona_id', $p['id'])
                ->with('punintereses.carrera.intereses')
                ->with(['puninteresessort' => function ($query) {
                    $query->with('carrera');
                    $query->orderBy('puntaje', 'DESC');
                }])
                ->first();

            $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                ->where('persona_id', $p['id'])
                ->with('puntemperamentos.formula')
                ->with('areatemperamentos')
                ->first();

            if ($p_intereses && $p_temperamentos) {
                PDFConsolidados::dispatchNow($p, $p_intereses['punintereses'], $p_intereses['puninteresessort'], $p_temperamentos['puntemperamentos'], $p_temperamentos['areatemperamentos'], $encuesta['empresa']['nombre'], $request->hour, $areas, $ruedas, $tendencias, $talentos);
                $descargar = true;
            }
        }

        if ($encuesta_temp) {
            $temperamento_id = $encuesta_temp['id'];
        }

        Excel::store(new StatusExport($general['personas'], $encuesta['id'], $temperamento_id), 'Consolidado-' . $request->hour . '/' . $encuesta['empresa']['nombre'] . '-' . $request->interes_id . '.xlsx', 'local');

        if ($descargar) {
            return $this->descargarZip($request->hour);
        } else {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
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


        $path2 = storage_path('app/Consolidado-' . $hour);
        $files2 = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path2));
        foreach ($files2 as $name => $file) {
            if (!$file->isDir()) {
                $filePath2 = $file->getRealPath();

                $relativePath2 = substr($filePath2, strlen($path2));

                $zip->addFile($filePath2, $relativePath2);
            }
        }
        $zip->close();

        Storage::deleteDirectory('public/PDF-' . $hour); //CON ESTO BORRO LOS PDF

        Storage::deleteDirectory('Consolidado-' . $hour); //CON ESTO BORRO EL EXCEL

        return response()->download($zip_file)->deleteFileAfterSend(true);
    }


    public function links(Request $request)
    {
        $temperamento_id = '';

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        $general =  EncuestaGeneral::where('id', $interes['encuesta_general_id'])
            ->with('personas')
            ->first();

        $encuesta_temp = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        if ($encuesta_temp) {
            $temperamento_id = $encuesta_temp['id'];
        }

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        } else {
            return Excel::download(new LinkExport($interes['general']['personas'], $interes['id'], $temperamento_id), 'encuesta.xlsx');
        }
    }

    public function pdf_intereses($interes_id, $persona_id)
    {
        $carreras = Carrera::where('estado', 1)->orderBy('nombre', 'asc')
            ->get();

        $persona = Persona::where('id', $persona_id)
            ->first();

        $encuesta = EncuestaPuntaje::where('encuesta_id', $interes_id)
            ->where('persona_id', $persona_id)
            ->with('punintereses.carrera')
            ->with(['puninteresessort' => function ($query) {
                $query->with('carrera');
                $query->orderBy('puntaje', 'DESC');
            }])
            ->first();

        $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $persona, 'puntajes' => $encuesta['punintereses'], 'puntajes_sort' => $encuesta['puninteresessort']));
        return $pdf->download('Reporte-Intereses-' . str_replace(' ', '', $persona->nombres) . str_replace(' ', '', $persona->apellido_paterno) . str_replace(' ', '', $persona->apellido_materno) . '.pdf');
    }

    public function pdf_temperamentos($temperamento_id, $persona_id)
    {
        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')->get();

        $ruedas = Rueda::where('estado', '1')->get();

        $persona = Persona::where('id', $persona_id)
            ->first();

        $encuesta = EncuestaPuntaje::where('encuesta_id', $temperamento_id)
            ->where('persona_id', $persona_id)
            ->with('puntemperamentos.formula')
            ->with('areatemperamentos')
            ->first();

        $pdf = \PDF::loadView('reporte_temperamentos', array('ruedas' => $ruedas, 'persona' => $persona, 'p_temperamentos' => $encuesta['puntemperamentos'], 'a_temperamentos' => $encuesta['areatemperamentos'], 'areas' => $areas));

        return $pdf->download('Reporte-Temperamentos-' . str_replace(' ', '', $persona->nombres) .  str_replace(' ', '', $persona->apellido_paterno) . str_replace(' ', '', $persona->apellido_materno) . '.pdf');
    }

    public function status(Request $request)
    {
        $temperamento_id = '';

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        $general =  EncuestaGeneral::where('id', $interes['encuesta_general_id'])
            ->with('personas')
            ->first();

        $encuesta_temp = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('tipo_encuesta_id', 3)
            ->first();

        if ($encuesta_temp) {
            $temperamento_id = $encuesta_temp['id'];
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
