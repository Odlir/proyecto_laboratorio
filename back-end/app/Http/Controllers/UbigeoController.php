<?php

namespace App\Http\Controllers;

use App\EncuestaUbigeo;
use Illuminate\Http\Request;
use App\Ubigeo;

class UbigeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchValue = $request->input('search');

        $data = Ubigeo::where(function ($query) use ($searchValue) {
                $query->where("departamento", "LIKE", "%$searchValue%")
                    ->orWhere('provincia', "LIKE", "%$searchValue%")
                    ->orWhere('distrito', "LIKE", "%$searchValue%");
            });
        $data = $data->orderBy('id', 'DESC')->get();

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

        $registro = Ubigeo::create($data);

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
        $data = Ubigeo::with('insert')
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

        $registro = Ubigeo::find($id);
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
        $registro = Ubigeo::find($id);
        $registro->estado = '0';
        $registro->save();

        $encuestas = EncuestaUbigeo::where('ubigeo_id', $id)->get();
        foreach ($encuestas as $e) {
            $e->estado = '0';
            $e->save();
        }

        return response()->json($registro, 200);
    }
}
