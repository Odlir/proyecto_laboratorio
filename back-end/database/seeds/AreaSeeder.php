<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas=[
            ['nombre'=>'Extrovertido-Introvertido'],
            ['nombre'=>'Intuitivo-Sensorial'],
            ['nombre'=>'Racional-Emocional'],
            ['nombre'=>'Organizado-Casual'],
        ];

        Area::insert($areas);
    }
}
