<?php

namespace App\Http\Controllers;

use App\Area;
use App\Carrera;
use App\EmpresaSucursal;
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
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use PHPlot;
use stdClass;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValue = $request->input('search');
        $interes_id = $request->input('interes_id');

        $back = config('constants.back_end');

        $show = false;

        $interes = Encuesta::where('id', $interes_id)
            ->first();

        $general =  EncuestaGeneral::where('id', $interes['encuesta_general_id'])
            ->with(['personas' => function ($q) use ($searchValue) {
                $q->where('personas.estado', '1')
                    ->where(function ($query) use ($searchValue) {
                        $query->where("personas.nombres", "LIKE", "%$searchValue%")
                            ->orWhere('personas.apellido_materno', "LIKE", "%$searchValue%")
                            ->orWhere('personas.apellido_paterno', "LIKE", "%$searchValue%");
                    });
            }])
            ->first();

        $temperamento = Encuesta::where('encuesta_general_id', $general['id'])
            ->where('estado', '1')
            ->where('tipo_encuesta_id', 3)
            ->first();

        $talento = Encuesta::where('tipo_encuesta_id', 2)
            ->where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('estado', '1')
            ->first();

        if ($temperamento && $talento) {
            $show = true;
        }

        foreach ($general['personas'] as $p) {
            $data_interes = EncuestaPuntaje::where('encuesta_id', $interes['id'])
                ->where('persona_id', $p->id)
                ->first();

            $data_temperamento = EncuestaPuntaje::where('encuesta_id', $temperamento['id'])
                ->where('persona_id', $p->id)
                ->first();

            $data_talento = EncuestaPuntaje::where('encuesta_id', $talento['id'])
                ->where('persona_id', $p->id)
                ->first();

            if ($show) {
                if ($data_interes && $data_temperamento && $data_talento) {
                    $p->link = $back . 'exportar' . '/consolidados/' .  $request->interes_id . '/' . $p->id;
                } else {
                    $p->link = "";
                }
            } else {
                if ($data_interes) {
                    $p->link = $back . 'exportar' . '/intereses/' . $request->interes_id . '/' . $p->id;
                } else {
                    $p->link = "";
                }
            }

            if ($data_interes) {
                $p->status_int = "1"; //COMPLETADO
                $p->link_intereses = $back . 'exportar' . '/intereses/' . $request->interes_id . '/' . $p->id;
            } else {
                $p->status_int = "0"; //PENDIENTE
            }

            if ($data_temperamento) {
                $p->status_temp = "1"; //COMPLETADO
            } else {
                $p->status_temp = "0"; //PENDIENTE
            }

            if ($data_talento) {
                $p->status_tal = "1"; //COMPLETADO
            } else {
                $p->status_tal = "0"; //PENDIENTE
            }
        }

        return response()->json([$general['personas'], "show" => $show], 200);
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
        } else if ($request->campo == "consolidado_sede") {
            return $this->consolidado_sede($request);
        }
    }

    public function consolidado_sede(Request $request)
    {
        $show = false;

        $error = "";

        $data_muestra = [];

        $años = [];

        $sexo = [
            'masculino' => 0,
            'femenino' => 0
        ];

        $intereses = Encuesta::where('tipo_encuesta_id', 1)
            ->where('empresa_sucursal_id', $request->empresa_id)
            ->where('estado', '1')
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->get();

        if ($intereses->isEmpty()) {
            return response()->json(['error' => 'No hay encuestas registradas.'], 404);
        }

        foreach ($intereses as $i) {
            $temperamento = Encuesta::where('tipo_encuesta_id', 3)
                ->where('empresa_sucursal_id', $request->empresa_id)
                ->where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('estado', '1')
                ->first();

            $talento = Encuesta::where('tipo_encuesta_id', 2)
                ->where('empresa_sucursal_id', $request->empresa_id)
                ->where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('estado', '1')
                ->first();

            if ($temperamento && $talento) {
                $show = true;
                break;
            } else {
                $show = false;
                $error = 'No hay encuestas de temperamentos o talentos registradas.';
            }
        }

        if ($show == false) {
            return response()->json(['error' => $error], 404);
        }

        foreach ($intereses as $i) {
            if (!$i['general']['personas']->isEmpty()) {
                $show = true;
                break;
            } else {
                $show = false;
                $error = 'No hay alumnos registrados.';
            }
        }

        if ($show == false) {
            return response()->json(['error' => $error], 404);
        }

        foreach ($intereses as $i) {
            $encuesta_temp = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 3)
                ->where('estado', '1')
                ->first();

            $encuesta_tal = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 2)
                ->where('estado', '1')
                ->first();

            foreach ($i['general']['personas'] as $p) { //PARA LOS CONSOLIDADOS
                $p_intereses = EncuestaPuntaje::where('encuesta_id', $i['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $p_talentos = EncuestaPuntaje::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                if ($p_intereses && $p_temperamentos && $p_talentos) {
                    $show = true;
                    break 2; //SALGO DE LOS 2 FOREACH
                } else {
                    $show = false;
                    $error = 'No hay encuestas resueltas.';
                }
            }
        }

        if ($show == false) {
            return response()->json(['error' => $error], 404);
        }

        foreach ($intereses as $i) {
            $encuesta_temp = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 3)
                ->where('estado', '1')
                ->first();

            $encuesta_tal = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 2)
                ->where('estado', '1')
                ->first();

            foreach ($i['general']['personas'] as $p) { //PARA LOS CONSOLIDADOS
                $p_intereses = EncuestaPuntaje::where('encuesta_id', $i['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $p_talentos = EncuestaPuntaje::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                if ($p_intereses && $p_temperamentos && $p_talentos) {
                    if (!in_array($p['anio'], $años)) {
                        array_push($años, $p['anio']);
                    }
                }
            }
        }

        foreach ($años as $a) {
            $object = new stdClass();
            $object->anio = $a;
            $object->muestra = 0;
            array_push($data_muestra, $object);
        }

        $total_temperamentos = [];
        $puntajes_temperamentos = [];

        foreach ($intereses as $i) {
            $encuesta_temp = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 3)
                ->where('estado', '1')
                ->first();

            $encuesta_tal = Encuesta::where('encuesta_general_id', $i['encuesta_general_id'])
                ->where('tipo_encuesta_id', 2)
                ->where('estado', '1')
                ->first();

            foreach ($i['general']['personas'] as $p) { //PARA LOS CONSOLIDADOS
                $p_intereses = EncuestaPuntaje::where('encuesta_id', $i['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                    ->where('persona_id', $p['id'])
                    ->with('puntemperamentos.formula')
                    ->first();

                $p_talentos = EncuestaPuntaje::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                if ($p_intereses && $p_temperamentos && $p_talentos) {
                    foreach ($data_muestra as $m) {
                        if ($m->anio == $p['anio']) {
                            $m->muestra++;
                        }
                    }

                    if (strcasecmp($p['sexo'], 'masculino') == 0) {
                        $sexo['masculino']++;
                    } else {
                        $sexo['femenino']++;
                    }

                    ///////

                    array_push($total_temperamentos, $p_temperamentos['puntemperamentos']);
                }
            }
        }

        foreach ($total_temperamentos as $t) {
            foreach ($t as $p) {
                $object = new stdClass();
                $object->formula_id = $p['formula_id'];
                $object->area_id = $p['formula']['area_id'];
                $object->transformacion = 0;
                array_push($puntajes_temperamentos, $object);
            }
            break;
        }

        foreach ($total_temperamentos as $t) {
            foreach ($t as $p) {
                foreach ($puntajes_temperamentos as $p_t) {
                    if ($p_t->formula_id == $p['formula_id']) {
                        $p_t->transformacion = $p_t->transformacion + $p['transformacion'];
                    }
                }
            }
        }

        foreach ($puntajes_temperamentos as $p_t) {
            $p_t->transformacion = $p_t->transformacion / count($total_temperamentos);
        }

        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')
            ->get();

        $now = Carbon::now();
        $date = ucfirst($now->isoFormat('MMMM')) . ', ' . $now->year;

        $encuesta = Encuesta::where('tipo_encuesta_id', 3)
            ->where('empresa_sucursal_id', $request->empresa_id)
            ->where('estado', '1')
            ->first();

        $fecha = Carbon::parse($encuesta['fecha_inicio']);
        $fecha_evaluacion =  $fecha->format('d') . ' de ' . ucfirst($fecha->isoFormat('MMMM'));

        $colegio = EmpresaSucursal::find($request->empresa_id);

        $tendencias = TendenciaTalento::all();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $talentos_ordenados = Talento::where('tendencia_id', "!=", null)
            ->orderBy("nombre")
            ->get();

        $pdf = PDF::loadView('consolidado_sede', array('date' => $date, 'talentos' => $talentos, 'talentos_ordenados' => $talentos_ordenados, 'fecha_evaluacion' => $fecha_evaluacion, 'colegio' => $colegio['nombre'], 'tendencias' => $tendencias, 'muestra' => $data_muestra, 'sexo' => $sexo, 'p_temperamentos' => $puntajes_temperamentos, 'areas' => $areas));
        return $pdf->download('Consolidado_sede.pdf');
    }

    public function reportes(Request $request)
    {
        $back = config('constants.back_end');

        $show = false;

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $temperamento = Encuesta::where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->first();

        $talento = Encuesta::where('tipo_encuesta_id', 2)
            ->where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('estado', '1')
            ->first();

        if ($temperamento && $talento) {
            $show = true;
        }

        foreach ($interes['general']['personas'] as $p) {
            $data_interes = EncuestaPuntaje::where('encuesta_id', $interes['id'])
                ->where('persona_id', $p->id)
                ->first();

            $data_temperamento = EncuestaPuntaje::where('encuesta_id', $temperamento['id'])
                ->where('persona_id', $p->id)
                ->first();

            $data_talento = EncuestaPuntaje::where('encuesta_id', $talento['id'])
                ->where('persona_id', $p->id)
                ->first();

            if ($show) {
                if ($data_interes && $data_temperamento && $data_talento) {
                    $p->link = $back . 'exportar' . '/consolidados/' .  $request->interes_id . '/' . $p->id;
                } else {
                    $p->link = "";
                }
            } else {
                if ($data_interes) {
                    $p->link = $back . 'exportar' . '/intereses/' . $request->interes_id . '/' . $p->id;
                } else {
                    $p->link = "";
                }
            }

            if ($data_interes) {
                $p->status_int = "1"; //COMPLETADO
                $p->link_intereses = $back . 'exportar' . '/intereses/' . $request->interes_id . '/' . $p->id;
            } else {
                $p->status_int = "0"; //PENDIENTE
            }

            if ($data_temperamento) {
                $p->status_temp = "1"; //COMPLETADO
            } else {
                $p->status_temp = "0"; //PENDIENTE
            }

            if ($data_talento) {
                $p->status_tal = "1"; //COMPLETADO
            } else {
                $p->status_tal = "0"; //PENDIENTE
            }
        }

        return response()->json([$interes['general']['personas'], 'show' => $show], 200);
    }

    public function intereses(Request $request)
    {
        $encuesta = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        if ($encuesta['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
            ->whereHas('persona', function ($q) {
                $q->where('estado', '1');
            })
            ->with('punintereses.carrera')
            ->with(['puninteresessort' => function ($query) {
                $query->with('carrera');
                $query->orderBy('puntaje', 'DESC');
            }])
            ->get();

        if ($personas->isEmpty()) {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
        }

        $identificador = rand();

        foreach ($personas as $p) {
            PDFIntereses::dispatchNow($p['persona'], $p['punintereses'], $p['puninteresessort'], $encuesta['empresa']['nombre'], $identificador);
        }

        Excel::store(new StatusInteresesExport($encuesta['general']['personas'], $encuesta['id']), 'Consolidado-' . $identificador . '/' . $encuesta['empresa']['nombre'] . '-' . $request->interes_id . '.xlsx', 'local');

        return $this->descargarZip($identificador);
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
            ->first();

        $encuesta_temp = Encuesta::where('encuesta_general_id', $encuesta['encuesta_general_id'])
            ->where('estado', '1')
            ->where('tipo_encuesta_id', 3)
            ->first();

        $encuesta_tal = Encuesta::where('encuesta_general_id', $encuesta['encuesta_general_id'])
            ->where('tipo_encuesta_id', 2)
            ->where('estado', '1')
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

        $tendencias_pie = TendenciaTalento::where('id', '!=', 7)->get();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $pie = $this->pieTalentos(10, 20, 30, 40, 50, 60);

        $identificador = rand();

        $pdf = PDF::loadView('consolidado/reporte_consolidados', array('areas' => $areas, 'ruedas' => $ruedas, 'persona' => $persona, 'p_temperamentos' => $p_temperamentos['puntemperamentos'], 'a_temperamentos' => $p_temperamentos['areatemperamentos']))->output();

        $pdf2 = PDF::loadView('consolidado/talentos1', array('talentos' => $talentos, 'tendencias' => $tendencias))->setPaper('a4', 'landscape')->output();

        $pdf3 = PDF::loadView('consolidado/talentos2', array('tendencias' => $tendencias_pie, 'pie' => $pie))->output();

        $pdf4 = PDF::loadView('consolidado/talentos3', array('tendencias' => $tendencias))->setPaper('a4', 'landscape')->output();

        $pdf5 = PDF::loadView('consolidado/reporte_consolidados2', array('p_intereses' => $p_intereses['punintereses'], 'p_intereses_sort' => $p_intereses['puninteresessort']))->output();

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

    public function pieTalentos($personas, $emprendimiento, $innovacion, $estructura, $persuasion, $cognicion)
    {
        $data = array(
            array('', $innovacion),
            array('', $emprendimiento),
            array('', $personas),
            array('', $cognicion),
            array('', $persuasion),
            array('', $estructura),
        );

        $plot = new PHPlot(800, 600);

        $plot->SetPlotType('pie');
        $plot->SetDataType('text-data-single');
        $plot->SetDataValues($data);

        $plot->SetDataColors(array(
            '#FFE700', '#FF7700', '#EA2F0A', '#216FBE', '#8A0A0A',
            '#73BE21'
        ));

        $plot->SetPrintImage(False);
        $plot->SetPieLabelType('label');
        $plot->DrawGraph();

        return $plot;
    }

    public function jobs(Request $request)
    {
        $descargar = false;

        $encuesta = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        if ($encuesta['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $temperamento_id = "";

        $talento_id = "";

        $encuesta_temp = Encuesta::where('encuesta_general_id', $encuesta['encuesta_general_id'])
            ->where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->first();

        $encuesta_tal = Encuesta::where('encuesta_general_id', $encuesta['encuesta_general_id'])
            ->where('tipo_encuesta_id', 2)
            ->where('estado', '1')
            ->first();

        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')->get();

        $ruedas = Rueda::where('estado', '1')->get();

        $tendencias = TendenciaTalento::all();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $identificador = rand();

        foreach ($encuesta['general']['personas'] as $p) { //PARA LOS CONSOLIDADOS
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
                $pie = $this->pieTalentos(10, 20, 30, 40, 50, 60);
                PDFConsolidados::dispatchNow($p, $p_intereses['punintereses'], $p_intereses['puninteresessort'], $p_temperamentos['puntemperamentos'], $p_temperamentos['areatemperamentos'], $encuesta['empresa']['nombre'], $identificador, $areas, $ruedas, $tendencias, $talentos, $pie);
                $descargar = true;
            }
        }

        if ($encuesta_temp && $encuesta_tal) {
            $temperamento_id = $encuesta_temp['id'];
            $talento_id = $encuesta_tal['id'];
        }

        if ($descargar) {
            Excel::store(new StatusExport($encuesta['general']['personas'], $encuesta['id'], $temperamento_id, $talento_id), 'Consolidado-' . $identificador . '/' . $encuesta['empresa']['nombre'] . '-' . $request->interes_id . '.xlsx', 'local');
            return $this->descargarZip($identificador);
        } else {
            return response()->json(['error' => 'No hay encuestas resueltas.'], 404);
        }
    }

    public function descargarZip($identificador)
    {
        $zip_file = 'PDF-' . $identificador . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $path = storage_path('app/public/PDF-' . $identificador);
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();

                $relativePath = substr($filePath, strlen($path));

                $zip->addFile($filePath, $relativePath);
            }
        }


        $path2 = storage_path('app/Consolidado-' . $identificador);
        $files2 = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path2));
        foreach ($files2 as $name => $file) {
            if (!$file->isDir()) {
                $filePath2 = $file->getRealPath();

                $relativePath2 = substr($filePath2, strlen($path2));

                $zip->addFile($filePath2, $relativePath2);
            }
        }
        $zip->close();

        Storage::deleteDirectory('public/PDF-' . $identificador); //CON ESTO BORRO LOS PDF

        Storage::deleteDirectory('Consolidado-' . $identificador); //CON ESTO BORRO EL EXCEL

        return response()->download($zip_file)->deleteFileAfterSend(true);
    }


    public function links(Request $request)
    {
        $temperamento_id = '';
        $talento_id = "";

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $encuesta_temp = Encuesta::where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->first();

        $encuesta_tal = Encuesta::where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('tipo_encuesta_id', 2)
            ->where('estado', '1')
            ->first();

        if ($encuesta_temp && $encuesta_tal) {
            $temperamento_id = $encuesta_temp['id'];
            $talento_id = $encuesta_tal['id'];
        }

        return Excel::download(new LinkExport($interes['general']['personas'], $interes['id'], $temperamento_id, $talento_id), 'encuesta.xlsx');
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

        $pdf = PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $persona, 'puntajes' => $encuesta['punintereses'], 'puntajes_sort' => $encuesta['puninteresessort']));
        return $pdf->download('Reporte-Intereses-' . str_replace(' ', '', $persona->nombres) . str_replace(' ', '', $persona->apellido_paterno) . str_replace(' ', '', $persona->apellido_materno) . '.pdf');
    }

    // public function pdf_temperamentos($temperamento_id, $persona_id)
    // {
    //     $areas = Area::with('items.items')
    //         ->with('formulas')
    //         ->where('estado', '1')->get();

    //     $ruedas = Rueda::where('estado', '1')->get();

    //     $persona = Persona::where('id', $persona_id)
    //         ->first();

    //     $encuesta = EncuestaPuntaje::where('encuesta_id', $temperamento_id)
    //         ->where('persona_id', $persona_id)
    //         ->with('puntemperamentos.formula')
    //         ->with('areatemperamentos')
    //         ->first();

    //     $pdf = PDF::loadView('reporte_temperamentos', array('ruedas' => $ruedas, 'persona' => $persona, 'p_temperamentos' => $encuesta['puntemperamentos'], 'a_temperamentos' => $encuesta['areatemperamentos'], 'areas' => $areas));

    //     return $pdf->download('Reporte-Temperamentos-' . str_replace(' ', '', $persona->nombres) .  str_replace(' ', '', $persona->apellido_paterno) . str_replace(' ', '', $persona->apellido_materno) . '.pdf');
    // }

    public function status(Request $request)
    {
        $temperamento_id = '';
        $talento_id = "";

        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $encuesta_temp = Encuesta::where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->first();

        $encuesta_tal = Encuesta::where('encuesta_general_id', $interes['encuesta_general_id'])
            ->where('tipo_encuesta_id', 2)
            ->where('estado', '1')
            ->first();

        if ($encuesta_temp && $encuesta_tal) {
            $temperamento_id = $encuesta_temp['id'];
            $talento_id = $encuesta_tal['id'];
        }

        return Excel::download(new StatusExport($interes['general']['personas'], $interes['id'], $temperamento_id, $talento_id), 'encuesta.xlsx');
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
