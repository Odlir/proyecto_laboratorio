<?php

namespace App\Http\Controllers;

use App\Talento;
use App\TalentoEspecificoMasDesarrollado;
use App\TalentoMasDesarrollado;
use App\TalentoRespuesta;
use Illuminate\Http\Request;

class TalentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('tipo') != null) {
            $tipo = $request->input('tipo');
            $persona_id = $request->input('persona_id');
            $encuesta_id = $request->input('encuesta_id');

            if ($tipo == 4) {
                $mas = TalentoEspecificoMasDesarrollado::where('persona_id', $persona_id)
                    ->where('encuesta_id', $encuesta_id)
                    ->get();

                $data = Talento::where('estado', '1')
                    ->where('tipo_id', 2)
                    ->get();

                foreach ($data as $key => $e) {
                    foreach ($mas as $m) {
                        if ($e['id'] == $m['talento_id']) {
                            $data->forget($key);
                        }
                    }
                }
            } else {
                $data = TalentoRespuesta::where('persona_id', $persona_id)
                    ->where('encuesta_id', $encuesta_id)
                    ->where('tipo', $tipo)
                    ->with('talento')
                    ->get();
            }
        } else {
            $data = Talento::where('estado', '1')
                ->get();
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Talento::where('estado', '1')
            ->where('tipo_id', $id)
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
