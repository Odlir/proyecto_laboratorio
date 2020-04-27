<?php

use App\TendenciaTalento;
use Illuminate\Database\Seeder;

class TendenciaTalentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tendencias=[
            ['nombre'=>'Orientado a las Personas','descripcion'=>'Orientado a las Personas','color'=>'Rojo'],
            ['nombre'=>'Orientado al Emprendimiento','descripcion'=>'Orientado al Pensamiento','color'=>'Azul'],
            ['nombre'=>'Orientado a la Innovación','descripcion'=>'Orientado a la Innovación','color'=>'Amarillo'],
            ['nombre'=>'Orientado a la Estructura','descripcion'=>'Orientado a la Estructura','color'=>'Verde'],
            ['nombre'=>'Orientado a la Persuación','descripcion'=>'Orientado a la Ejecución','color'=>'Anaranjado'],
            ['nombre'=>'Orientado a la Cognición','descripcion'=>'Orientado al Liderazgo','color'=>'Guinda'],
        ];

        TendenciaTalento::insert($tendencias);
    }
}
