<?php

namespace App\Jobs;

use App\Carrera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PDFIntereses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $persona;
    protected $puntajes;
    protected $empresa;
    protected $hour;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona, $puntajes, $empresa,$hour)
    {
        $this->persona = $persona;
        $this->puntajes = $puntajes;
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
        $intereses = \PDF::loadView('reporte_interes', array('persona' => $this->persona, 'puntajes' => $this->puntajes))->output();

        $name = 'PDF-' . $this->hour . '/INTERESES-'  . str_replace(' ', '', $this->persona->nombres) .  str_replace(' ', '',$this->persona->apellido_paterno) . str_replace(' ', '',$this->persona->apellido_materno) . '.pdf';
        \Storage::disk('public')->put($name,  $intereses);
    }
}
