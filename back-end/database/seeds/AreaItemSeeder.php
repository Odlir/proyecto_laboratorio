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
            ['nombre'=>'Extrovertido','area_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Introvertido','area_id'=>1,'posicion'=>'0'],
            ['nombre'=>'Intiutivo','area_id'=>2,'posicion'=>'1'],
            ['nombre'=>'Sensorial','area_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Racional','area_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Emocional','area_id'=>3,'posicion'=>'0'],
            ['nombre'=>'Organizado','area_id'=>4,'posicion'=>'1'],
            ['nombre'=>'Casual','area_id'=>4,'posicion'=>'0'],
        ];

        AreaItem::insert($items);
    }
}
