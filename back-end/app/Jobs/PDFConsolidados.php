<?php

namespace App\Jobs;

use App\Area;
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
    protected $empresa;
    protected $hour;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona,$p_intereses, $p_temperamentos, $empresa, $hour)
    {
        $this->persona = $persona;
        $this->p_intereses = $p_intereses;
        $this->p_temperamentos = $p_temperamentos;
        $this->empresa = $empresa;
        $this->hour = $hour;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $areas = Area::with('items.items')
            ->with('formulas')
            ->where('estado', '1')->get();

        $consolidados = \PDF::loadView('reporte_consolidados', array('areas' => $areas, 'persona' => $this->persona, 'p_intereses' => $this->p_intereses,'p_temperamentos' => $this->p_temperamentos))->output();

        $name = 'PDF-' . $this->hour . '/' . $this->empresa . '/CONSOLIDADOS/' . $this->persona->nombres . '-' . $this->persona->apellido_paterno . '-' . $this->persona->apellido_materno . '.pdf';
        \Storage::disk('public')->put($name,  $consolidados);
    }
}
