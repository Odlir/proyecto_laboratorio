<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresaSucursal;

class EmpresaSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('id') != null) //LO USO PARA EL BUSCADOR EN EL CRUD DE SUCURSALES
        {
            $searchValue = $request->input('search');
            $data = EmpresaSucursal::where('estado', '1')
                ->where('empresa_id', $request->input('id'))
                ->where(function ($query) use ($searchValue) {
                    $query->where('id', "LIKE", "%$searchValue%")
                        ->orWhere('nombre', "LIKE", "%$searchValue%");
                })
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $data = EmpresaSucursal::where('estado', '1')
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

        EmpresaSucursal::create($data);

        $sucursales = EmpresaSucursal::where("empresa_id", $request->input('id'))
            ->where('estado', '1')
            ->get();

        return response()->json($sucursales, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = EmpresaSucursal::with('insert')
            ->with('edit')
            ->with('pais')
            ->with('ciudad')
            ->with('empresa')
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

        $registro = EmpresaSucursal::find($id);
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
        $registro = EmpresaSucursal::find($id);
        $registro->estado = '0';
        $registro->save();

        $sucursales = EmpresaSucursal::where("empresa_id", $registro->empresa_id)
            ->where('estado', '1')
            ->get();

        return response()->json($sucursales, 200);
    }
}
