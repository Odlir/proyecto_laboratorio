<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\EncuestaPersona;
use App\EncuestaRespuesta;
use App\Persona;
use Illuminate\Http\Request;

class EncuestaPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValue=$request->input('search');
        $data = Encuesta::where('estado','1')
        ->where('id',$request->input('id'))
        ->with('insert')
        ->with('edit')
        ->with('empresa')
        ->with('tipo')
        ->with(['personas' => function ($q) use($searchValue){
            $q->where('personas.estado',"1")
            // ->with('insert')
            // ->with('edit')
            ->where(function($query) use ($searchValue){
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
        $data= $request->all();

        foreach($data as $d)
        {
           EncuestaRespuesta::create($d);
        }

        return response()->json($data, 200);
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
        $registro = EncuestaPersona::find($id);
        $registro->estado='0';
        $registro->save();

        $persona = Persona::find($registro->persona_id);
        $persona->estado='0';
        $persona->save();

        $personas= Encuesta::with('insert')
        ->with('edit')
        ->with('empresa')
        ->with(['personas' => function ($query) {
            $query->where('personas.estado', '1');
        }])
        ->with('tipo')
        ->where('id',$registro->encuesta_id)
        ->first();

        return response()->json($personas, 200);
    }
}
