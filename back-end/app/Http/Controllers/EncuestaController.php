<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\TipoEncuesta;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('search') != null) // BUSCAR POR EMPRESA O POR TIPO
        {
            $searchValue = $request->input('search');

            $data = Encuesta::with('empresa')
                ->with('tipo')
                ->where('estado', '1')
                ->where(function ($query) use ($searchValue) {
                    $query->where("id", "LIKE", "%$searchValue%")
                        ->orwhereHas('empresa', function ($q) use ($searchValue) {
                            $q->where("nombre", "LIKE", "%$searchValue%");
                        })
                        ->orWhereHas('tipo', function ($query) use ($searchValue) {
                            $query->where("nombre", "LIKE", "%$searchValue%");
                        });
                })
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $data = Encuesta::where('estado', '1')
                ->with('empresa')
                ->with('tipo')
                ->orderBy('id', 'DESC')
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

        $id = [];
        if ($request->campo == 'todas') {
            $tipos = TipoEncuesta::where('estado', '1')
                ->orderBy('id', 'DESC')
                ->get();

            unset($data['tipo_encuesta_id']);

            foreach ($tipos as $t) {

                $data['tipo_encuesta_id'] = $t->id;

                $registro = Encuesta::create($data);

                array_push($id, $registro['id']);
            }

            return response()->json($id, 200);
            
        } else {
            $registro = Encuesta::create($data);
            return response()->json($registro, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Encuesta::with('insert')
            ->with('edit')
            ->with('empresa')
            ->with(['personas' => function ($query) {
                $query->where('personas.estado', '1')
                    ->orderBy('id', 'DESC');
            }])
            ->with('tipo')
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

        $registro = Encuesta::find($id);
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
        $registro = Encuesta::find($id);
        $registro->estado = '0';
        $registro->save();

        return response()->json($registro, 200);
    }
}
