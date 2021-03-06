<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo_encuesta = $request->input('tipo');
        if ($request->input('general_id') != null) {
            $data = Encuesta::where('estado', '1')
                ->where('tipo_encuesta_id', $tipo_encuesta)
                ->where('encuesta_general_id', $request->input('general_id'))
                ->get();
        } else {
            $sucursal = $request->input('sucursal');
            $data = Encuesta::where('estado', '1')
                ->where('tipo_encuesta_id', $tipo_encuesta)
                ->with('general')
                ->whereHas('empresa', function ($q) use ($sucursal) {
                    $q->where('id', $sucursal);
                })
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
        //
    }
}
