<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Encuesta;
use App\EncuestaPuntaje;
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
        $temperamento_id = '';

        if ($request->campo == "persona") {
            return response()->download(storage_path("app/public/importar-alumnos.xlsx"));
        } else if ($request->campo == "links") {
            $interes = Encuesta::where('id', $request->interes_id)
                ->with(['general' => function ($query) {
                    $query->with(['personas' => function ($query) {
                        $query->wherePivot('estado', '1')
                            ->orderBy('id', 'DESC');
                    }]);
                }])
                ->first();

            if ($request->temperamento_id != null) {
                $temperamento = Encuesta::where('id', $request->temperamento_id)
                    ->with(['general' => function ($query) {
                        $query->with(['personas' => function ($query) {
                            $query->wherePivot('estado', '1')
                                ->orderBy('id', 'DESC');
                        }]);
                    }])
                    ->first();
                $temperamento_id = $temperamento['id'];
            }

            if ($interes['general']['personas']->isEmpty()) {
                return response()->json(['error' => 'No hay alumnos registrados'], 401);
            } else {
                return Excel::download(new LinkExport($interes['general']['personas'], $interes['id'], $temperamento_id), 'encuesta.xlsx');
            }
        } else if ($request->campo == "pdf") {
            $carreras = Carrera::where('estado', 1)->get();

            $personas = EncuestaPuntaje::where('encuesta_id', $request->interes_id)
                ->with('persona')
                ->with('puntajes.carrera')
                ->get();

            foreach ($personas as $p) {
                $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $p['persona'], 'puntajes' => $p['puntajes']));
                return $pdf->download('reporte_interes.pdf');
            }

            // $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'personas' => $personas));
            // return $pdf->download('reporte_interes.pdf');
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
