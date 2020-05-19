<?php

namespace App\Http\Controllers;

use App\EncuestaPuntaje;
use App\TalentoEspecificoMasDesarrollado;
use App\TalentoEspecificoMenosDesarrollado;
use App\TalentoMasDesarrollado;
use App\TalentoMenosDesarrollado;
use App\TalentoRespuesta;
use Illuminate\Http\Request;

class EncuestaPuntajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = EncuestaPuntaje::where('encuesta_id', $request->input('encuesta_id'))
            ->where('persona_id', $request->input('persona_id'))
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
    public function store(Request $request) //AQUI GUARDO TALENTOS
    {
        $data = $request->all();

        if ($data[1] == 1) {
            foreach ($data[0] as $d) { //TODOS LOS TALENTOS
                TalentoRespuesta::create($d);
            }
        } else if ($data[1] == 2) {
            foreach ($data[0] as $d) //TALENTOS MAS DESARROLLADOS
            {
                TalentoMasDesarrollado::create($d);
            }
        } else if ($data[1] == 3) {
            foreach ($data[0] as $d) //TALENTOS MENOS DESARROLLADOS
            {
                TalentoMenosDesarrollado::create($d);
            }
        } else if ($data[1] == 4) {
            foreach ($data[0] as $d) //TALENTOS ESPECIFICOS MAS DESARROLLADOS
            {
                TalentoEspecificoMasDesarrollado::create($d);
            }
        } else if ($data[1] == 5) {
            foreach ($data[0] as $d) //TALENTOS ESPECIFICOS MENOS DESARROLLADOS
            {
                TalentoEspecificoMenosDesarrollado::create($d);
            }
        }

        return response()->json('Success', 200);
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
