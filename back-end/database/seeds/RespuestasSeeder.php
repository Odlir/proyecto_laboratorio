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
            ['tipo_encuesta_id'=>1,'nombre'=> 'Totalmente en Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>1,'nombre'=> 'En Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>1,'nombre'=> 'De Acuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Totalmente de Acuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>1,'nombre'=> 'No','subpregunta'=> '3'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Si','subpregunta'=> '3'],

            ['tipo_encuesta_id'=>3,'nombre'=> 'Totalmente en Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Muy en Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'En Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Ni de Acuerdo ni en Desacuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'De Acuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Muy de Acuerdo','subpregunta'=> null],
            ['tipo_encuesta_id'=>3,'nombre'=> 'Totalmente de Acuerdo','subpregunta'=> null],
        ];

        Respuesta::insert($respuestas);
    }
}
