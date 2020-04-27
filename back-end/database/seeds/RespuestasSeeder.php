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
            ['puntaje'=>'3','tipo_encuesta_id'=>1,'nombre'=> 'Totalmente en Desacuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'5','tipo_encuesta_id'=>1,'nombre'=> 'En Desacuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'7','tipo_encuesta_id'=>1,'nombre'=> 'De Acuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'10','tipo_encuesta_id'=>1,'nombre'=> 'Totalmente de Acuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'3','tipo_encuesta_id'=>1,'nombre'=> 'No','tipo_subpregunta'=> '2'],
            ['puntaje'=>'5','tipo_encuesta_id'=>1,'nombre'=> 'Si','tipo_subpregunta'=> '2'],

            ['puntaje'=>'1','tipo_encuesta_id'=>3,'nombre'=> 'Totalmente en Desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'2','tipo_encuesta_id'=>3,'nombre'=> 'Muy en Desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'3','tipo_encuesta_id'=>3,'nombre'=> 'En Desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'4','tipo_encuesta_id'=>3,'nombre'=> 'Ni de Acuerdo ni en Desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'5','tipo_encuesta_id'=>3,'nombre'=> 'De Acuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'6','tipo_encuesta_id'=>3,'nombre'=> 'Muy de Acuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'7','tipo_encuesta_id'=>3,'nombre'=> 'Totalmente de Acuerdo','tipo_subpregunta'=> null],
        ];

        Respuesta::insert($respuestas);
    }
}
