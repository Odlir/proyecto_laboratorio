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
use App\TalentoEspecificoMasDesarrollado;
use App\TalentoMasDesarrollado;
use App\TalentoRespuesta;
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

        $temperamento = $this->encuestaTemperamento($general['id']);

        $talento = $this->encuestaTalento($general['id']);

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
            $temperamento = $this->encuestaTemperamento($i['encuesta_general_id']);

            $talento = $this->encuestaTalento($i['encuesta_general_id']);

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
            $encuesta_temp = $this->encuestaTemperamento($i['encuesta_general_id']);

            $encuesta_tal = $this->encuestaTalento($i['encuesta_general_id']);

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

            $encuesta_temp = $this->encuestaTemperamento($i['encuesta_general_id']);

            $encuesta_tal = $this->encuestaTalento($i['encuesta_general_id']);

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

        $total_intereses = [];
        $puntajes_intereses = [];

        $total_talentos = [];
        $puntajes_talentos = [];
        $puntajes_talentos_e = [];

        $puntajes_talentos_mas = [];

        $total_talentos_e = [];
        $puntajes_talentos_mas_e = [];

        foreach ($intereses as $i) {

            $encuesta_temp = $this->encuestaTemperamento($i['encuesta_general_id']);

            $encuesta_tal = $this->encuestaTalento($i['encuesta_general_id']);

            foreach ($i['general']['personas'] as $p) { //PARA LOS CONSOLIDADOS
                $p_intereses = EncuestaPuntaje::where('encuesta_id', $i['id'])
                    ->where('persona_id', $p['id'])
                    ->with('punintereses.carrera')
                    ->first();

                $p_temperamentos = EncuestaPuntaje::where('encuesta_id', $encuesta_temp['id'])
                    ->where('persona_id', $p['id'])
                    ->with('puntemperamentos.formula')
                    ->first();

                $p_talentos = EncuestaPuntaje::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->first();

                $talentos_mas_desarrollados = TalentoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->with('talento.descripciones')
                    ->with('talento.tendencia')
                    ->orderBy('talento_id')
                    ->get();

                $talentos_mas_especificos = TalentoEspecificoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->with('talento')
                    ->get();


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

                    array_push($total_intereses, $p_intereses['punintereses']);

                    array_push($total_talentos, $talentos_mas_desarrollados);

                    array_push($total_talentos_e, $talentos_mas_especificos);
                }
            }
        }

        foreach ($total_temperamentos as $t) {
            foreach ($t as $p) {
                $object = new stdClass();
                $object->formula_id = $p['formula_id'];
                $object->area_id = $p['formula']['area_id'];
                $object->puntaje = 0;
                $object->transformacion = 0;
                array_push($puntajes_temperamentos, $object);
            }
            break;
        }

        foreach ($total_temperamentos as $t) {
            foreach ($t as $p) {
                foreach ($puntajes_temperamentos as $p_t) {
                    if ($p_t->formula_id == $p['formula_id']) {
                        $p_t->puntaje = $p_t->puntaje + $p['puntaje'];
                    }
                }
            }
        }

        foreach ($puntajes_temperamentos as $p_t) {
            $p_t->puntaje = $p_t->puntaje / count($total_temperamentos);
            $p_t->puntaje = round($p_t->puntaje);

            if ($p_t->puntaje == 7) { //HAGO LA TRANSFORMACIÓN DE LOS PUNTAJES
                $p_t->transformacion = 3;
            } else if ($p_t->puntaje == 6) {
                $p_t->transformacion = 2;
            } else if ($p_t->puntaje == 5) {
                $p_t->transformacion = 1;
            } else if ($p_t->puntaje == 4) {
                $p_t->transformacion = 0;
            } else if ($p_t->puntaje == 3) {
                $p_t->transformacion = -1;
            } else if ($p_t->puntaje == 2) {
                $p_t->transformacion = -2;
            } else if ($p_t->puntaje == 1) {
                $p_t->transformacion = -3;
            }
        }

        foreach ($total_intereses as $i) {
            foreach ($i as $p) {
                $object = new stdClass();
                $object->carrera_id = $p['carrera_id'];
                $object->carrera = $p['carrera']['nombre'];
                $object->carrera2 = ucwords(mb_strtolower($p['carrera']['nombre']));
                $object->descripcion = $p['carrera']['interes'];
                $object->puntaje = 0;
                array_push($puntajes_intereses, $object);
            }
            break;
        }

        foreach ($total_intereses as $i) {
            foreach ($i as $p) {
                foreach ($puntajes_intereses as $p_i) {
                    if ($p_i->carrera_id == $p['carrera_id']) {
                        $p_i->puntaje = $p_i->puntaje + $p['puntaje'];
                    }
                }
            }
        }

        foreach ($puntajes_intereses as $p_i) {
            $p_i->puntaje = $p_i->puntaje / count($total_intereses);
            $p_i->puntaje = (int) $p_i->puntaje;
        }

        foreach ($total_talentos as $t) { //PARA EL PIE
            foreach ($t as $p) {
                $object = array();
                $object['talento_id'] = $p['talento_id'];
                $object['talento'] = array();
                $object['talento']['tendencia_id'] = $p['talento']['tendencia_id'];
                array_push($puntajes_talentos, $object);
            }
        }

        foreach ($total_talentos_e as $t) { //PARA LA TABLA DE TALENTOS
            foreach ($t as $p) {
                $object = array();
                $object['talento_id'] = $p['talento_id'];
                array_push($puntajes_talentos_e, $object);
            }
        }

        $map = function ($v) {
            return $v['talento_id'];
        };

        $repetidos = array_count_values(array_map($map, $puntajes_talentos));

        $repetidos_e = array_count_values(array_map($map, $puntajes_talentos_e));

        arsort($repetidos);

        arsort($repetidos_e);

        $contador = 0;
        $contador_e = 0;

        foreach ($repetidos as $key => $val) {
            if ($contador == 12) {
                break;
            } else {
                $talento = Talento::where('id', $key)->first();
                array_push($puntajes_talentos_mas, $talento);
            }
            $contador++;
        }

        foreach ($repetidos_e as $key => $val) {
            if ($contador_e == 3) {
                break;
            } else {
                $talento = Talento::where('id', $key)->first();
                array_push($puntajes_talentos_mas_e, $talento);
            }
            $contador_e++;
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

        $tendencias_pie = TendenciaTalento::where('id', '!=', 7)->get();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $talentos_ordenados = Talento::where('tendencia_id', "!=", null)
            ->orderBy("nombre")
            ->get();

        $puntajes_pie = $this->puntajesPie((array) $puntajes_talentos, $tendencias_pie);

        $pie = $this->pieTalentos((array) $puntajes_talentos, $tendencias_pie);

        $pdf = PDF::loadView('consolidado_sede', array('date' => $date, 'talentos' => $talentos, 'talentos_ordenados' => $talentos_ordenados, 'fecha_evaluacion' => $fecha_evaluacion, 'colegio' => $colegio['nombre'], 'tendencias' => $tendencias, 'muestra' => $data_muestra, 'sexo' => $sexo, 'p_temperamentos' => $puntajes_temperamentos, 'areas' => $areas, 'p_intereses' => $puntajes_intereses, 'tendencias_pie' => $tendencias_pie, 'pie' => $pie, 'puntajes_pie' => $puntajes_pie, 'talentos_mas_desarrollados' => $puntajes_talentos_mas, 'talentos_mas_especificos' => $puntajes_talentos_mas_e));
        return $pdf->download('Consolidado_sede.pdf');
    }

    public function reportes(Request $request)
    {
        $back = config('constants.back_end');

        $show = false;

        $interes = $this->encuestaInteres($request->interes_id);

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $temperamento = $this->encuestaTemperamento($interes['encuesta_general_id']);

        $talento = $this->encuestaTalento($interes['encuesta_general_id']);

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
        $encuesta = $this->encuestaInteres($request->interes_id);

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

        $encuesta = $this->encuestaInteres($interes_id);

        $encuesta_temp = $this->encuestaTemperamento($encuesta['encuesta_general_id']);

        $encuesta_tal = $this->encuestaTalento($encuesta['encuesta_general_id']);

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

        $talentos_mas_desarrollados = TalentoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
            ->where('persona_id', $persona_id)
            ->with('talento.descripciones')
            ->with('talento.tendencia')
            ->orderBy('talento_id')
            ->get();

        $talentos_mas_especificos = TalentoEspecificoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
            ->where('persona_id', $persona_id)
            ->with('talento')
            ->get();

        $tendencias_pie = TendenciaTalento::where('id', '!=', 7)->get();

        $tendencias = TendenciaTalento::all();

        $talentos = Talento::where('tendencia_id', "!=", null)
            ->with('tendencia')
            ->get();

        $puntajes_pie = $this->puntajesPie($talentos_mas_desarrollados, $tendencias_pie);

        $pie = $this->pieTalentos($talentos_mas_desarrollados, $tendencias_pie);

        $identificador = rand();

        $pdf = PDF::loadView('consolidado/reporte_consolidados', array('areas' => $areas, 'ruedas' => $ruedas, 'persona' => $persona, 'p_temperamentos' => $p_temperamentos['puntemperamentos'], 'a_temperamentos' => $p_temperamentos['areatemperamentos']))->output();

        $pdf2 = PDF::loadView('consolidado/talentos1', array('talentos' => $talentos, 'tendencias' => $tendencias))->setPaper('a4', 'landscape')->output();

        $pdf3 = PDF::loadView('consolidado/talentos2', array('tendencias' => $tendencias_pie, 'pie' => $pie, 'puntajes' => $puntajes_pie))->output();

        $pdf4 = PDF::loadView('consolidado/talentos3', array('tendencias' => $tendencias, 'talentos' => $talentos_mas_desarrollados, 'talentos_e' => $talentos_mas_especificos))->setPaper('a4', 'landscape')->output();

        $pdf5 = PDF::loadView('consolidado/reporte_consolidados2', array('talentos' => $talentos_mas_desarrollados, 'p_intereses' => $p_intereses['punintereses'], 'p_intereses_sort' => $p_intereses['puninteresessort']))->output();

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

    public function puntajesPie($talentos_mas_desarrollados, $tendencias_pie)
    {
        $factor = 100 / count($talentos_mas_desarrollados);

        $puntajes_pie = [];

        foreach ($tendencias_pie as $t) {
            $object = new stdClass();
            $object->puntaje = 0;
            $object->tendencia_id = $t['id'];
            array_push($puntajes_pie, $object);
        }

        foreach ($tendencias_pie as $t) {
            foreach ($talentos_mas_desarrollados as $d) {
                if ($d['talento']['tendencia_id'] == $t['id']) {
                    foreach ($puntajes_pie as $d) {
                        if ($d->tendencia_id == $t['id']) {
                            $d->puntaje++;
                        }
                    }
                }
            }
        }

        foreach ($puntajes_pie as $d) {
            $d->puntaje = $d->puntaje * $factor;
            $d->puntaje = round($d->puntaje);
        }

        return $puntajes_pie;
    }

    public function pieTalentos($t_desarrollados, $tendencias_pie)
    {
        $factor = 100 / count($t_desarrollados);

        $personas = 0;
        $emprendimiento = 0;
        $innovacion = 0;
        $estructura = 0;
        $persuasion = 0;
        $cognicion = 0;

        foreach ($tendencias_pie as $t) {
            foreach ($t_desarrollados as $d) {
                if ($d['talento']['tendencia_id'] == $t['id']) {
                    if ($t['id'] == 1) {
                        $personas++;
                    } else if ($t['id'] == 2) {
                        $emprendimiento++;
                    } else if ($t['id'] == 3) {
                        $innovacion++;
                    } else if ($t['id'] == 4) {
                        $estructura++;
                    } else if ($t['id'] == 5) {
                        $persuasion++;
                    } else if ($t['id'] == 6) {
                        $cognicion++;
                    }
                }
            }
        }

        // echo '/personas'.$personas;
        // echo '/emprendimiento'.$emprendimiento;
        // echo '/innovacion'.$innovacion;
        // echo '/estructura'.$estructura;
        // echo '/persuasion'.$persuasion;
        // echo '/cognicion'.$cognicion; 

        $data = array(
            array('', $innovacion * $factor),
            array('', $emprendimiento * $factor),
            array('', $personas * $factor),
            array('', $cognicion * $factor),
            array('', $persuasion * $factor),
            array('', $estructura * $factor),
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

        $temperamento_id = "";

        $talento_id = "";

        $encuesta = $this->encuestaInteres($request->interes_id);

        if ($encuesta['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $encuesta_temp = $this->encuestaTemperamento($encuesta['encuesta_general_id']);

        $encuesta_tal = $this->encuestaTalento($encuesta['encuesta_general_id']);

        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')
            ->get();

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

            $p_talentos = EncuestaPuntaje::where('encuesta_id', $encuesta_tal['id'])
                ->where('persona_id', $p['id'])
                ->first();

            if ($p_intereses && $p_temperamentos && $p_talentos) {

                $talentos_mas_desarrollados = TalentoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->with('talento.descripciones')
                    ->with('talento.tendencia')
                    ->orderBy('talento_id')
                    ->get();

                $talentos_mas_especificos = TalentoEspecificoMasDesarrollado::where('encuesta_id', $encuesta_tal['id'])
                    ->where('persona_id', $p['id'])
                    ->with('talento')
                    ->get();

                $tendencias_pie = TendenciaTalento::where('id', '!=', 7)->get();

                $pie = $this->pieTalentos($talentos_mas_desarrollados, $tendencias_pie);

                $puntajes_pie = $this->puntajesPie($talentos_mas_desarrollados, $tendencias_pie);

                PDFConsolidados::dispatchNow($p, $p_intereses['punintereses'], $p_intereses['puninteresessort'], $p_temperamentos['puntemperamentos'], $p_temperamentos['areatemperamentos'], $encuesta['empresa']['nombre'], $identificador, $areas, $ruedas, $tendencias, $talentos, $pie, $puntajes_pie, $talentos_mas_desarrollados, $talentos_mas_especificos, $tendencias_pie);
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

        $interes = $this->encuestaInteres($request->interes_id);

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $encuesta_temp = $this->encuestaTemperamento($interes['encuesta_general_id']);

        $encuesta_tal = $this->encuestaTalento($interes['encuesta_general_id']);

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

        $interes = $this->encuestaInteres($request->interes_id);

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 404);
        }

        $encuesta_temp = $this->encuestaTemperamento($interes['encuesta_general_id']);

        $encuesta_tal = $this->encuestaTalento($interes['encuesta_general_id']);

        if ($encuesta_temp && $encuesta_tal) {
            $temperamento_id = $encuesta_temp['id'];
            $talento_id = $encuesta_tal['id'];
        }

        return Excel::download(new StatusExport($interes['general']['personas'], $interes['id'], $temperamento_id, $talento_id), 'encuesta.xlsx');
    }

    public function encuestaInteres($interes_id)
    {
        $interes = Encuesta::where('id', $interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
            }])
            ->first();

        return $interes;
    }

    public function encuestaTalento($general_id)
    {
        $talento = Encuesta::where('encuesta_general_id', $general_id)
            ->where('tipo_encuesta_id', 2)
            ->where('estado', '1')
            ->first();

        return $talento;
    }

    public function encuestaTemperamento($general_id)
    {
        $temperamento = Encuesta::where('encuesta_general_id', $general_id)
            ->where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->first();

        return $temperamento;
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
