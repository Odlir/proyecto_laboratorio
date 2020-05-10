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
            ['nombre'=>'Orientados a las Personas','descripcion'=>'Orientado a las Personas','color'=>'#EA2F0A'],
            ['nombre'=>'Orientados al Emprendimiento','descripcion'=>'Orientado al Pensamiento','color'=>'#FF7700'],
            ['nombre'=>'Orientados a la Innovación','descripcion'=>'Orientado a la Innovación','color'=>'#FFE700'],
            ['nombre'=>'Orientados a la Estructura','descripcion'=>'Orientado a la Estructura','color'=>'#73BE21'],
            ['nombre'=>'Orientados a la Persuasión','descripcion'=>'Orientado a la Ejecución','color'=>'#8A0A0A'],
            ['nombre'=>'Orientados a la Cognición','descripcion'=>'Orientado al Liderazgo','color'=>'#216FBE'],
            ['nombre'=>'Talentos Específicos','descripcion'=>'Talentos Específicos','color'=>'#A25DBB'],
        ];

        TendenciaTalento::insert($tendencias);
    }
}
