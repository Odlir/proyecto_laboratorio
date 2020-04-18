<?php

use App\SubPregunta;
use Illuminate\Database\Seeder;

class SubPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subpreguntas = [
            ['tipo_encuesta_id' => 1, 'nombre' => 'Me gustaría realizar esta actividad (*)', 'tipo_subpregunta' => '1'],
            ['tipo_encuesta_id' => 1, 'nombre' => 'Tengo las habilidades para aprender a realizar esta actividad (*)', 'tipo_subpregunta' => '1'],
            ['tipo_encuesta_id' => 1, 'nombre' => '¿Crees que esta actividad te brindaría algún tipo de satisfacción (personal, económica, reconocimiento de los demás, entre otras)? (*)', 'tipo_subpregunta' => '2']
        ];

        SubPregunta::insert($subpreguntas);
    }
}
