<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;


class PDFIntereses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $persona;
    protected $puntajes;
    protected $puntajes_sort;
    protected $empresa;
    protected $identificador;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona, $puntajes,$puntajes_sort, $empresa,$identificador)
    {
        $this->persona = $persona;
        $this->puntajes = $puntajes;
        $this->puntajes_sort = $puntajes_sort;
        $this->empresa = $empresa;
        $this->identificador = $identificador;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $intereses = PDF::loadView('reporte_interes', array('persona' => $this->persona, 'puntajes' => $this->puntajes,'puntajes_sort'=>$this->puntajes_sort))->output();

        $name = 'PDF-' . $this->identificador . '/INTERESES-'  . str_replace(' ', '', $this->persona->nombres) .  str_replace(' ', '',$this->persona->apellido_paterno) . str_replace(' ', '',$this->persona->apellido_materno) . '.pdf';
        \Storage::disk('public')->put($name,  $intereses);
    }
}
