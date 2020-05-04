<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PDFConsolidados implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $persona;
    protected $p_intereses;
    protected $p_temperamentos;
    protected $a_temperamentos;
    protected $empresa;
    protected $areas;
    protected $ruedas;
    protected $hour;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona, $p_intereses, $p_temperamentos, $a_temperamentos, $empresa, $hour,$areas,$ruedas)
    {
        $this->persona = $persona;
        $this->p_intereses = $p_intereses;
        $this->p_temperamentos = $p_temperamentos;
        $this->a_temperamentos = $a_temperamentos;
        $this->empresa = $empresa;
        $this->hour = $hour;
        $this->areas = $areas;
        $this->ruedas = $ruedas;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $consolidados = \PDF::loadView('reporte_consolidados', array('areas' => $this->areas, 'ruedas' => $this->ruedas, 'persona' => $this->persona, 'p_intereses' => $this->p_intereses, 'p_temperamentos' => $this->p_temperamentos, 'a_temperamentos' => $this->a_temperamentos))->output();

        $name = 'PDF-' . $this->hour . '/CONSOLIDADO-'  . str_replace(' ', '',$this->persona->nombres) .  str_replace(' ', '',$this->persona->apellido_paterno) . str_replace(' ', '',$this->persona->apellido_materno) . '.pdf';
        \Storage::disk('public')->put($name,  $consolidados);
    }
}
