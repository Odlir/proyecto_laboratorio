<?php

namespace App\Http\Controllers;

use App\EncuestaOrdenAtencion;
use Illuminate\Http\Request;
use App\OrdenAtencion;

class OrdenAtencionController extends Controller
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

        $data = OrdenAtencion::where('rol_id', '2')->where(function ($query) use ($searchValue) {
                $query->where("id", "LIKE", "%$searchValue%")
                    ->orWhere('nro_atencion', "LIKE", "%$searchValue%")
                    ->orWhere('fecha_atencion', "LIKE", "%$searchValue%")
                    ->orWhere('hora_atencion', "LIKE", "%$searchValue%")
                    ->orWhere('paciente', "LIKE", "%$searchValue%")
                    ->orWhere('analisis', "LIKE", "%$searchValue%");
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
        $data['rol_id'] = 2;

        $registro = OrdenAtencion::create($data);

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
        $data = OrdenAtencion::with('insert')
            ->with('edit')
            ->where('rol_id', '2')
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

        $registro = OrdenAtencion::find($id);
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
        $registro = OrdenAtencion::find($id);
        $registro->estado = '0';
        $registro->save();

        $encuestas = EncuestaOrdenAtencion::where('orden_atencion_id', $id)->get();
        foreach ($encuestas as $e) {
            $e->estado = '0';
            $e->save();
        }

        return response()->json($registro, 200);
    }
}
