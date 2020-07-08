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
            ['puntaje'=>'1','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'Totalmente en desacuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'2','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'En desacuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'3','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'De acuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'4','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'Totalmente de acuerdo','tipo_subpregunta'=> '1'],
            ['puntaje'=>'1','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'No','tipo_subpregunta'=> '2'],
            ['puntaje'=>'2','inversa'=>null,'tipo_encuesta_id'=>1,'nombre'=> 'Si','tipo_subpregunta'=> '2'],

            ['puntaje'=>'1','inversa'=>'7','tipo_encuesta_id'=>3,'nombre'=> 'Totalmente en desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'2','inversa'=>'6','tipo_encuesta_id'=>3,'nombre'=> 'Muy en desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'3','inversa'=>'5','tipo_encuesta_id'=>3,'nombre'=> 'En desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'4','inversa'=>'4','tipo_encuesta_id'=>3,'nombre'=> 'Ni de acuerdo ni en Desacuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'5','inversa'=>'3','tipo_encuesta_id'=>3,'nombre'=> 'De acuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'6','inversa'=>'2','tipo_encuesta_id'=>3,'nombre'=> 'Muy de acuerdo','tipo_subpregunta'=> null],
            ['puntaje'=>'7','inversa'=>'1','tipo_encuesta_id'=>3,'nombre'=> 'Totalmente de acuerdo','tipo_subpregunta'=> null],
        ];

        Respuesta::insert($respuestas);
    }
}
