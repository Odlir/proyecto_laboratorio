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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($persona, $puntajes)
    {
        $this->persona = $persona;
        $this->puntajes = $puntajes;
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

        $pdf = \PDF::loadView('reporte_interes', array('carreras' => $carreras, 'persona' => $this->persona, 'puntajes' => $this->puntajes));
        return $pdf->download('reporte_interes.pdf');
    }
}
