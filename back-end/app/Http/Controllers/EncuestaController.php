<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\EncuestaGeneral;
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
        $paginate = $request->input('paginate');

        $offset = $request->input('offset') * $paginate;

        $searchValue = $request->input('search');

        $data = Encuesta::with('empresa')
            ->with('tipo')
            ->with('general')
            ->where('estado', '1')
            ->where(function ($query) use ($searchValue) {
                $query->where("id", "LIKE", "%$searchValue%")
                    ->orwhereHas('empresa', function ($q) use ($searchValue) {
                        $q->where("nombre", "LIKE", "%$searchValue%");
                    })
                    ->orWhereHas('tipo', function ($query) use ($searchValue) {
                        $query->where("nombre", "LIKE", "%$searchValue%");
                    });
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

        $general = EncuestaGeneral::create($data);

        $data['encuesta_general_id'] = $general->id;

        if ($request->todas) {
            $tipos = TipoEncuesta::where('estado', '1')
                ->orderBy('id', 'DESC')
                ->get();

            unset($data['tipo_encuesta_id']);

            foreach ($tipos as $t) {

                $data['tipo_encuesta_id'] = $t->id;

                $registro = Encuesta::create($data);
            }
        } else {

            $registro = Encuesta::create($data);
        }

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
        $data = Encuesta::with('insert')
            ->with('edit')
            ->with('empresa')
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1');
                }]);
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

        $general = EncuestaGeneral::find($registro['encuesta_general_id']);
        $general->update($data);
        $general->save();

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
