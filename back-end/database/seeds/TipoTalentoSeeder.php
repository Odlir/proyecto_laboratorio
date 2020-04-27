<?php

use App\TipoTalento;
use Illuminate\Database\Seeder;

class TipoTalentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos=[
            ['nombre'=>'General'],

            ['nombre'=>'Específico'],

            ['nombre'=>'Virtud']
        ];

        TipoTalento::insert($tipos);
    }
}
