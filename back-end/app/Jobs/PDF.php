<?php

namespace App\Jobs;

use App\Carrera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PDF implements ShouldQueue
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
        $carreras = Carrera::where('estado', 1)->orderBy('nombre', 'asc')
            ->get();

        $content = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $this->persona, 'puntajes' => $this->puntajes))->output();

        $name = 'PDF-'.$this->hour.'/'.$this->empresa . '/INTERESES/' . $this->persona->nombres . '-' . $this->persona->apellido_paterno . '.pdf';
        \Storage::disk('public')->put($name,  $content);
    }
}
