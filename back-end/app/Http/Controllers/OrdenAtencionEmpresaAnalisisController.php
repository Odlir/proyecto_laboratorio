<?php

namespace App\Http\Controllers;

use App\EncuestaOrdenAtencionEmpresaAnalisis;
use Illuminate\Http\Request;
use App\OrdenAtencionEmpresaAnalisis;

class OrdenAtencionEmpresaAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->input('paginate');

        $offset = $request->input('offset') * $paginate;

        $searchValue = $request->input('search');

        $data = OrdenAtencionEmpresaAnalisis::where('estado', '1')->where(function ($query) use ($searchValue) {
                $query->where("id", "LIKE", "%$searchValue%")
                    ->orWhere('paciente_id', "LIKE", "%$searchValue%")
                    ->orWhere('fecha_registro', "LIKE", "%$searchValue%")
                    ->orWhere('oa_empresa_id', "LIKE", "%$searchValue%")
                    ->orWhere('estado', "LIKE", "%$searchValue%");
            });

        if (!$paginate) {
            $data = $data->count();
        } else {
            $data = $data
                ->skip($offset)
                ->take($paginate)
                ->orderBy('id', 'DESC')->get();
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
        $data = $request->all();

        $registro = OrdenAtencionEmpresaAnalisis::create($data);

        return response()->json($registro, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrdenAtencionEmpresaAnalisis::with('insert')
            ->with('edit')
            ->where('id', $id)
            ->first();

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
        $data = $request->all();

        $registro = OrdenAtencionEmpresaAnalisis::find($id);
        $registro->update($data);
        $registro->save();

        return response()->json($registro, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = OrdenAtencionEmpresaAnalisis::find($id);
        $registro->estado = '0';
        $registro->save();

        $encuestas = EncuestaOrdenAtencionEmpresaAnalisis::where('orden_atencion_empresa_analisis_id', $id)->get();
        foreach ($encuestas as $e) {
            $e->estado = '0';
            $e->save();
        }

        return response()->json($registro, 200);
    }
}
