<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaPuntaje;
use App\Carrera;
use App\CarreraPuntaje;
use App\Encuesta;
use App\EncuestaPersona;
use App\EncuestaPuntaje;
use App\EncuestaRespuesta;
use App\Formula;
use App\FormulaItem;
use App\FormulaPuntaje;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use stdClass;

class EncuestaPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValue = $request->input('search');

        $data = Encuesta::where('estado', '1')
            ->where('id', $request->input('id'))
            ->with('insert')
            ->with('edit')
            ->with('empresa')
            ->with('tipo')
            ->with(['general' => function ($query) use ($searchValue) {
                $query->with(['personas' => function ($q) use ($searchValue) {
                    $q->wherePivot('estado', '1')
                        ->where(function ($query) use ($searchValue) {
                            $query->where("personas.id", "LIKE", "%$searchValue%")
                                ->orWhere("personas.nombres", "LIKE", "%$searchValue%")
                                ->orWhere('personas.apellido_materno', "LIKE", "%$searchValue%")
                                ->orWhere('personas.apellido_paterno', "LIKE", "%$searchValue%")
                                ->orWhere('personas.sexo', "LIKE", "%$searchValue%")
                                ->orWhere('personas.email', "LIKE", "%$searchValue%");
                        });
                }]);
            }])
            ->first();

        return response()->json($data, 200);
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
    public function store(Request $request) //AQUI GUARDO LAS RESPUESTAS DE LAS ENCUESTAS
    {
        $data = $request->all();

        //DATA[0] ES LA ENCUESTA_ID Y SU PERSONA_ID

        EncuestaPuntaje::where('encuesta_id', $data[0]['encuesta_id'])
                ->where('persona_id', $data[0]['persona_id'])
                ->delete();

        $encuesta_puntaje = EncuestaPuntaje::create($data[0]); //TABLA PRINCIPAL
        
        //DATA[1] SE REFIERE AL TIPO DE ENCUESTA
        //DATA[2] SON TUS RESPUESTAS

        if ($data[1]== 1) {
            return $this->intereses($data[2],$encuesta_puntaje['id']);
        } else if ($data[1]== 3) {
            return $this->temperamentos($data[2],$encuesta_puntaje['id']);
        } else if ($data[1]== 2) {
            return response()->json($encuesta_puntaje['id'], 200);
        }
    }

    public function intereses($data,$encuesta_puntaje_id)
    {
        $puntajes_preguntas = [];

        $puntajes_carreras = [];

        $preguntas = Pregunta::where('tipo_encuesta_id', 1)
            ->where('estado', '1')
            ->get();

        $carreras = Carrera::where('estado', '1')
            ->get();

        foreach ($preguntas as $p) {
            $object = new stdClass();
            $object->pregunta_id = $p['id'];
            $object->carrera_id = $p['carrera_id'];
            $object->puntaje = 0;
            array_push($puntajes_preguntas, $object);
        }

        foreach ($carreras as $c) {
            $object2 = new stdClass();
            $object2->carrera_id = $c['id'];
            $object2->puntaje = 0;
            array_push($puntajes_carreras, $object2);
        }

        foreach ($data as $d) { //SUMO TODOS LOS PUNTAJES DE LAS RESPUESTAS
            $respuesta = Respuesta::find($d['respuesta_id']);
            foreach ($puntajes_preguntas as $p) {
                if ($d['pregunta_id'] == $p->pregunta_id) {
                    $p->puntaje = $p->puntaje + $respuesta['puntaje'];
                }
            }
        }

        foreach ($puntajes_carreras as $c) { //SUMO TODOS LOS PUNTAJES DE LAS PREGUNTAS PARA ASIGNARLE A LA CARRERA
            foreach ($puntajes_preguntas as $p) {
                if ($p->carrera_id == $c->carrera_id) {
                    $c->puntaje = $c->puntaje + $p->puntaje;
                }
            }
        }

        foreach ($puntajes_carreras as $c) { //VERIFICO SI LA CARRERA ES SALUD, PORQUE SU PUNTAJE SE CALCULA DIFERENTE
            if ($c->carrera_id == 16) {
                $c->puntaje = ($c->puntaje / 6) * 4;
            }

            $c->puntaje = round($c->puntaje); //REDONDEANDO
        }

        foreach ($puntajes_carreras as $c) {
            CarreraPuntaje::create(array_merge((array) $c, ['encuesta_puntaje_id' => $encuesta_puntaje_id]));
        }

        foreach ($data as $d) { //CREO LAS RESPUESTAS
            EncuestaRespuesta::create(array_merge($d, ['encuesta_puntaje_id' => $encuesta_puntaje_id]));
        }

        return response()->json($puntajes_carreras, 200);
    }

    public function temperamentos($data,$encuesta_puntaje_id)
    {
        $puntajes_preguntas = [];

        $puntajes_items = [];

        $puntajes_formulas = [];

        $puntajes_rueda = [];

        $areas = Area::where('estado', '1')
            ->get();

        $formulas = Formula::where('estado', '1')
            ->with('area')
            ->get();

        $formulas_items = FormulaItem::where('estado', '1')
            ->get();

        $preguntas = Pregunta::where('tipo_encuesta_id', 3)
            ->where('estado', '1')
            ->get();


        foreach ($preguntas as $p) {
            $object = new stdClass();
            $object->pregunta_id = $p['id'];
            $object->formula_item_id = $p['formula_item_id'];
            $object->puntaje = 0;
            $object->inversa = $p['inversa'];
            array_push($puntajes_preguntas, $object);
        }

        foreach ($formulas_items as $i) {
            $object2 = new stdClass();
            $object2->formula_item_id = $i['id'];
            $object2->formula_id = $i['formula_id'];
            $object2->puntaje = 0;
            $object2->cantidad = 0;
            array_push($puntajes_items, $object2);
        }

        foreach ($formulas as $f) {
            $object3 = new stdClass();
            $object3->formula_id = $f['id'];
            $object3->area_id = $f['area_id'];
            $object3->puntaje = 0;
            $object3->cantidad = 0;
            $object3->transformacion = 0;
            array_push($puntajes_formulas, $object3);
        }

        foreach ($areas as $a) {
            $object4 = new stdClass();
            $object4->area_id = $a['id'];
            $object4->palabra = "";
            $object4->puntaje = 0;
            $object4->letra = "";
            array_push($puntajes_rueda, $object4);
        }

        foreach ($data as $d) { //ASIGNO LOS PUNTAJES A LAS PREGUNTAS
            $respuesta = Respuesta::find($d['respuesta_id']);
            $puntaje = 0;

            foreach ($puntajes_preguntas as $p) {
                if ($d['pregunta_id'] == $p->pregunta_id) {

                    if ($p->inversa == '1') { //HAGO EL CAMBIO DE PUNTAJE EN CASO LA PREGUNTA SEA INVERSA
                        $puntaje = $respuesta['inversa'];
                    } else {
                        $puntaje = $respuesta['puntaje'];
                    }

                    $p->puntaje = $puntaje;
                }
            }
        }

        foreach ($puntajes_items as $i) { //SUMO TODOS LOS PUNTAJES DE LAS PREGUNTAS PARA ASIGNARLE AL ITEM
            foreach ($puntajes_preguntas as $p) {
                if ($p->formula_item_id == $i->formula_item_id) {
                    $i->puntaje = $i->puntaje + $p->puntaje;
                    $i->cantidad++;
                }
            }
        }

        foreach ($puntajes_formulas as $f) { //SUMO TODOS LOS PUNTAJES DE LOS ITEMS PARA ASIGNARLE A LA FORMULA
            foreach ($puntajes_items as $i) {
                if ($f->formula_id == $i->formula_id) {
                    $f->puntaje = $f->puntaje + $i->puntaje;
                    $f->cantidad = $f->cantidad + $i->cantidad;
                }
            }
        }

        foreach ($puntajes_formulas as $f) { //SACO EL PROMEDIO POR FORMULA Y LUEGO LOS PUNTAJES POR AREA
            $f->puntaje = $f->puntaje / $f->cantidad;
            foreach ($puntajes_rueda as $r) {
                if ($r->area_id == $f->area_id) {
                    $r->puntaje = $r->puntaje + $f->puntaje;
                }
            }
        }

        foreach ($puntajes_formulas as $f) { //REDONDEO PARA LOS GRAFICOS DE BARRA
            $f->puntaje = round($f->puntaje);

            if ($f->puntaje == 7) { //HAGO LA TRANSFORMACIÓN DE LOS PUNTAJES
                $f->transformacion = 3;
            } else if ($f->puntaje == 6) {
                $f->transformacion = 2;
            } else if ($f->puntaje == 5) {
                $f->transformacion = 1;
            } else if ($f->puntaje == 4) {
                $f->transformacion = 0;
            } else if ($f->puntaje == 3) {
                $f->transformacion = -1;
            } else if ($f->puntaje == 2) {
                $f->transformacion = -2;
            } else if ($f->puntaje == 1) {
                $f->transformacion = -3;
            }

            FormulaPuntaje::create(array_merge((array) $f, ['encuesta_puntaje_id' => $encuesta_puntaje_id]));
        }

        foreach ($puntajes_rueda as $r) { //SACO LOS PROMEDIOS PARA LA SUPERRUEDA
            $r->puntaje = $r->puntaje / 4;

            if ($r->puntaje == 6.75) { //SE APLICA EL REDONDEO FINAL
                $r->puntaje=7;
            }else if($r->puntaje == 6.25){
                $r->puntaje=6.5; 
            }else if($r->puntaje == 5.75){
                $r->puntaje=6; 
            }else if($r->puntaje == 5.25){
                $r->puntaje=5.5; 
            }else if($r->puntaje == 4.75){
                $r->puntaje=5; 
            }else if($r->puntaje == 4.25){
                $r->puntaje=4.5; 
            }else if($r->puntaje == 3.75){
                $r->puntaje=4; 
            }else if($r->puntaje == 3.25){
                $r->puntaje=3.5; 
            }else if($r->puntaje == 2.75){
                $r->puntaje=3; 
            }else if($r->puntaje == 2.25){
                $r->puntaje=2.5; 
            }else if($r->puntaje == 1.75){
                $r->puntaje=2; 
            }else if($r->puntaje == 1.25){
                $r->puntaje=1.5; 
            }else if($r->puntaje == 0.75){
                $r->puntaje=1; 
            }

            //SE SACA LAS LETRAS
            if($r->area_id==1){
                if($r->puntaje>=1 && $r->puntaje<=3.49){
                    $r->letra="I";
                    $r->palabra="Introvertido";
                }else if($r->puntaje>=3.50 && $r->puntaje<=3.99){
                    $r->letra="i";
                    $r->palabra="introvertido";
                }else if($r->puntaje>=4 && $r->puntaje<=4.49){
                    $r->letra="e";
                    $r->palabra="extrovertido";
                }else if($r->puntaje>=4.5 && $r->puntaje<=7){
                    $r->letra="E";
                    $r->palabra="Extrovertido";
                }
            }else if($r->area_id==2){
                if($r->puntaje>=1 && $r->puntaje<=3.49){
                    $r->letra="S";
                    $r->palabra="Sensorial";
                }else if($r->puntaje>=3.50 && $r->puntaje<=3.99){
                    $r->letra="s";
                    $r->palabra="sensorial";
                }else if($r->puntaje>=4 && $r->puntaje<=4.49){
                    $r->letra="n";
                    $r->palabra="intuitivo";
                }else if($r->puntaje>=4.5 && $r->puntaje<=7){
                    $r->letra="N";
                    $r->palabra="Intuitivo";
                }
            }else if($r->area_id==3){
                if($r->puntaje>=1 && $r->puntaje<=3.49){
                    $r->letra="M";
                    $r->palabra="Emotivo";
                }else if($r->puntaje>=3.50 && $r->puntaje<=3.99){
                    $r->letra="m";
                    $r->palabra="emotivo";
                }else if($r->puntaje>=4 && $r->puntaje<=4.49){
                    $r->letra="r";
                    $r->palabra="racional";
                }else if($r->puntaje>=4.5 && $r->puntaje<=7){
                    $r->letra="R";
                    $r->palabra="Racional";
                }
            }else if($r->area_id==4){
                if($r->puntaje>=1 && $r->puntaje<=3.49){
                    $r->letra="C";
                    $r->palabra="Casual";
                }else if($r->puntaje>=3.50 && $r->puntaje<=3.99){
                    $r->letra="c";
                    $r->palabra="casual";
                }else if($r->puntaje>=4 && $r->puntaje<=4.49){
                    $r->letra="o";
                    $r->palabra="organizado";
                }else if($r->puntaje>=4.5 && $r->puntaje<=7){
                    $r->letra="O";
                    $r->palabra="Organizado";
                }
            }

            AreaPuntaje::create(array_merge((array) $r, ['encuesta_puntaje_id' => $encuesta_puntaje_id]));
        }

        foreach ($data as $d) { //CREO LAS RESPUESTAS
            EncuestaRespuesta::create(array_merge($d, ['encuesta_puntaje_id' => $encuesta_puntaje_id]));
        }

        return response()->json($puntajes_rueda, 200);
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
        $registro = EncuestaPersona::find($id);
        $registro->estado = '0';
        $registro->save();

        $personas = Encuesta::with('insert')
            ->with('edit')
            ->with('empresa')
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1')
                        ->orderBy('id', 'DESC');
                }]);
            }])
            ->with('tipo')
            ->where('id', $request->encuesta_id)
            ->first();

        return response()->json($personas, 200);
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
