<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Exports\LinkExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $mensaje = '';

        $data = $request->all();

        if ($request->campo == "persona") {
            return response()->download(storage_path("app/public/importar-alumnos.xlsx"));
        } else if ($request->campo == "links") {
            $encuesta = Encuesta::where('id', $request->encuesta_id)
                ->with('personas')
                ->first();

            if ($encuesta['personas']->isEmpty()) {
                if ($encuesta['tipo_encuesta_id'] == 1) {
                    $mensaje = "No Hay Alumnos Registrados en la encuesta de Interés";
                } else {
                    $mensaje = "No Hay Alumnos Registrados en la encuesta de Temperamentos";
                }

                return response()->json(['error' => $mensaje], 401);
            }
            else
            {
                return Excel::download(new LinkExport($encuesta['personas'], $encuesta['id']), 'encuesta.xlsx');
            }
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
