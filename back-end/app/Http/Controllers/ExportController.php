<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Encuesta;
use App\EncuestaPuntaje;
use App\Exports\LinkExport;
use App\Exports\StatusExport;
use App\Jobs\PDF;
use App\Persona;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Khill\Lavacharts\Lavacharts;

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
        } else if ($request->campo == "status") {
            return $this->status($request);
        } else if ($request->campo == "pdf") {
            
        }
    }

    public function pdf($interes_id, $persona_id)
    {
        $carreras = Carrera::where('estado', 1)->orderBy('nombre', 'asc')
            ->get();

        $persona = Persona::where('id', $persona_id)
            ->first();

        $encuesta = EncuestaPuntaje::where('encuesta_id', $interes_id)
            ->where('persona_id', $persona_id)
            ->with('puntajes.carrera')
            ->first();

        $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $persona, 'puntajes' => $encuesta['puntajes']));
        return $pdf->download('Reporte-Interes-'.$persona->nombres.''.$persona->apellido_paterno.'.pdf');
    }

    public function status(Request $request)
    {
        $interes = Encuesta::where('id', $request->interes_id)
            ->with(['general' => function ($query) {
                $query->with(['personas' => function ($query) {
                    $query->wherePivot('estado', '1')
                        ->orderBy('id', 'DESC');
                }]);
            }])
            ->first();

        if ($interes['general']['personas']->isEmpty()) {
            return response()->json(['error' => 'No hay alumnos registrados'], 401);
        } else {
            return Excel::download(new StatusExport($interes['general']['personas'], $interes['id']), 'encuesta.xlsx');
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
