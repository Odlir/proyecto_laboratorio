<?php

use App\AreaItem;
use Illuminate\Database\Seeder;

class AreaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items=[
            ['nombre'=>'Extrovertido','area_id'=>1],
            ['nombre'=>'Introvertido','area_id'=>1],
            ['nombre'=>'Intiutivo','area_id'=>2],
            ['nombre'=>'Sensorial','area_id'=>2],
            ['nombre'=>'Racional','area_id'=>3],
            ['nombre'=>'Emocional','area_id'=>3],
            ['nombre'=>'Organizado','area_id'=>4],
            ['nombre'=>'Casual','area_id'=>4],
        ];

        AreaItem::insert($items);
    }
}
