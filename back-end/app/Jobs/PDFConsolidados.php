<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use iio\libmergepdf\Merger;
use Barryvdh\DomPDF\Facade as PDF;

class PDFConsolidados implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $persona;
    protected $p_intereses;
    protected $p_intereses_sort;
    protected $p_temperamentos;
    protected $a_temperamentos;
    protected $empresa;
    protected $areas;
    protected $ruedas;
    protected $identificador;
    protected $tendencias;
    protected $tendencias_pie;
    protected $talentos;
    protected $pie_talentos;
    protected $puntajes_pie;
    protected $t_desarrollados;
    protected $t_especificos;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona, $p_intereses, $p_intereses_sort, $p_temperamentos, $a_temperamentos, $empresa, $identificador, $areas, $ruedas, $tendencias, $talentos, $pie_talentos, $puntajes_pie, $t_desarrollados, $t_especificos, $tendencias_pie)
    {
        $this->persona = $persona;
        $this->p_intereses = $p_intereses;
        $this->p_intereses_sort = $p_intereses_sort;
        $this->p_temperamentos = $p_temperamentos;
        $this->a_temperamentos = $a_temperamentos;
        $this->empresa = $empresa;
        $this->identificador = $identificador;
        $this->areas = $areas;
        $this->ruedas = $ruedas;
        $this->tendencias = $tendencias;
        $this->talentos = $talentos;
        $this->pie_talentos = $pie_talentos;
        $this->puntajes_pie = $puntajes_pie;
        $this->t_desarrollados = $t_desarrollados;
        $this->t_especificos = $t_especificos;
        $this->tendencias_pie = $tendencias_pie;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $identificador = rand();

        $pdf = PDF::loadView('consolidado/reporte_consolidados', array('areas' => $this->areas, 'ruedas' => $this->ruedas, 'persona' => $this->persona, 'p_temperamentos' => $this->p_temperamentos, 'a_temperamentos' => $this->a_temperamentos))->output();

        $pdf2 = PDF::loadView('consolidado/talentos1', array('talentos' => $this->talentos, 'tendencias' => $this->tendencias))->setPaper('a4', 'landscape')->output();

        $pdf3 = PDF::loadView('consolidado/talentos2', array('tendencias' => $this->tendencias_pie, 'pie' => $this->pie_talentos, 'puntajes' => $this->puntajes_pie))->output();

        $pdf4 = PDF::loadView('consolidado/talentos3', array('tendencias' => $this->tendencias, 'talentos' => $this->t_desarrollados, 'talentos_e' => $this->t_especificos))->setPaper('a4', 'landscape')->output();

        $pdf5 = PDF::loadView('consolidado/reporte_consolidados2', array('talentos' => $this->t_desarrollados, 'p_intereses' => $this->p_intereses, 'p_intereses_sort' => $this->p_intereses_sort))->output();

        $name = $identificador . '/1.pdf';
        $name2 = $identificador . '/2.pdf';
        $name3 = $identificador . '/3.pdf';
        $name4 = $identificador . '/4.pdf';
        $name5 = $identificador . '/5.pdf';

        $ruta = storage_path('app/public/' . $identificador . '/');

        Storage::disk('public')->put($name,  $pdf);
        Storage::disk('public')->put($name2,  $pdf2);
        Storage::disk('public')->put($name3,  $pdf3);
        Storage::disk('public')->put($name4,  $pdf4);
        Storage::disk('public')->put($name5,  $pdf5);

        $merger = new Merger;
        $merger->addIterator([$ruta . '1.pdf', $ruta . '2.pdf', $ruta . '3.pdf', $ruta . '4.pdf', $ruta . '5.pdf']);
        $pdfconsolidado = $merger->merge();

        $name = 'PDF-' . $this->identificador . '/CONSOLIDADO-'  . str_replace(' ', '', $this->persona->nombres) .  str_replace(' ', '', $this->persona->apellido_paterno) . str_replace(' ', '', $this->persona->apellido_materno) . '.pdf';

        Storage::disk('public')->put($name,  $pdfconsolidado);

        Storage::deleteDirectory('public/' . $identificador);
    }
}
