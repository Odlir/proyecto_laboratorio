<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Encuesta;
use App\EncuestaPersona;
use App\EncuestaPuntaje;
use App\EncuestaRespuesta;
use App\Persona;
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
            ->with(['personas' => function ($q) use ($searchValue) {
                $q->wherePivot('estado', '1')
                    // ->with('insert')
                    // ->with('edit')
                    ->where(function ($query) use ($searchValue) {
                        $query->where("personas.id", "LIKE", "%$searchValue%")
                            ->orWhere("personas.nombres", "LIKE", "%$searchValue%")
                            ->orWhere('personas.apellido_materno', "LIKE", "%$searchValue%")
                            ->orWhere('personas.apellido_paterno', "LIKE", "%$searchValue%")
                            ->orWhere('personas.sexo', "LIKE", "%$searchValue%")
                            ->orWhere('personas.email', "LIKE", "%$searchValue%");
                    })
                    ->orderBy('id', 'DESC');
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

        $puntajes_preguntas = [];

        $puntajes_carreras = [];

        foreach ($data as $d) {
            EncuestaRespuesta::create($d);
        }

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
            $object2->encuesta_id = $data[0]['encuesta_id'];
            $object2->persona_id = $data[0]['persona_id'];
            array_push($puntajes_carreras, $object2);
        }

        foreach ($data as $d) {
            $respuesta = Respuesta::find($d['respuesta_id']);
            foreach ($puntajes_preguntas as $p) {
                if ($d['pregunta_id'] == $p->pregunta_id) {
                    $p->puntaje = $p->puntaje + $respuesta['puntaje'];
                }
            }
        }

        foreach ($puntajes_carreras as $c) {
            foreach ($puntajes_preguntas as $p) {
                if ($p->carrera_id == $c->carrera_id) {
                    $c->puntaje = $c->puntaje + $p->puntaje;
                }
            }
        }

        foreach ($puntajes_carreras as $c) {
            EncuestaPuntaje::create((array) $c);
        }

        return response()->json($puntajes_carreras, 200);
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
