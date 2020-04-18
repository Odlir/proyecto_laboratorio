<?php

use App\Respuesta;
use Illuminate\Database\Seeder;

class RespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $respuestas=[
            ['tipo_encuesta_id'=>1,'nombre'=> 'Totalmente en Desacuerdo','tipo_subpregunta'=> '1'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'En Desacuerdo','tipo_subpregunta'=> '1'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'De Acuerdo','tipo_subpregunta'=> '1'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Totalmente de Acuerdo','tipo_subpregunta'=> '1'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'No','tipo_subpregunta'=> '2'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Si','tipo_subpregunta'=> '2'],

            ['tipo_encuesta_id'=>3,'nombre'=> 'Totalmente en Desacuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Muy en Desacuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'En Desacuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Ni de Acuerdo ni en Desacuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'De Acuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Muy de Acuerdo','tipo_subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Totalmente de Acuerdo','tipo_subpregunta'=> null],
        ];

        Respuesta::insert($respuestas);
    }
}
