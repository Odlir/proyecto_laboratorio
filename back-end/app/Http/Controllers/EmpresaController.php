<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\EmpresaSucursal;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('search')!=null)
        {
            $searchValue=$request->input('search');
            $data = Empresa::where('estado','1')
            ->where("codigo", "LIKE", "%$searchValue%")
            ->orWhere('razon_social', "LIKE", "%$searchValue%")
            ->orWhere('contacto', "LIKE", "%$searchValue%")
            ->orWhere('email', "LIKE", "%$searchValue%")
            ->orWhere('telefono', "LIKE", "%$searchValue%")
            ->get();
        }
        else
        {
            $data = Empresa::where('estado','1')
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
        $data= $request->all();

        $registro= Empresa::create($data);

        return $this->show($registro->id);

        // return response()->json($registro, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Empresa::with('insert')
        ->with('edit')
        ->with(['sucursales' => function ($query) {
            $query->where('estado', '1');
        }])
        ->where('id',$id)
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
        $data= $request->all();

        $registro = Empresa::find($id);
        $registro->update($data);
        $registro->save();

        return $this->show($id);

        // return response()->json($registro, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Empresa::find($id);
        $registro->estado='0';
        $registro->save();

        $sucursales = EmpresaSucursal::where('empresa_id',$id)->get();

        foreach($sucursales as $s)
        {
            $s->estado='0';
            $s->save();
        }

        return response()->json($registro, 200);
    }
}
