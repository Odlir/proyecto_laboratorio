<?php

namespace App\Http\Controllers;

use App\EncuestaRespuesta;
use App\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $encuesta = $request->input('encuesta');
        $subpregunta = $request->input('sub');

        $data = Respuesta::where('tipo_encuesta_id', $encuesta)
            ->where('tipo_subpregunta', $subpregunta)
            ->where('estado', '1')
            ->get();

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
    public function store(Request $request) //AQUI CONSULTO SI ES QUE LA ENCUESTA FUE COMPLETADA
    {
        $data = EncuestaRespuesta::where('encuesta_id', $request->encuesta_id)
            ->where('persona_id', $request->persona_id)
            ->first();

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
        $data = Respuesta::where('tipo_encuesta_id', $id)
            ->where('estado', '1')
            ->get();

        return response()->json($data, 200);
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
        //
    }
}
