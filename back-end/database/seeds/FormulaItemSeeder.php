<?php

use App\FormulaItem;
use Illuminate\Database\Seeder;

class FormulaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items=[
            ['nombre'=>'Ambientes Dinámicos','formula_id'=>1,'area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Ambientes Tranquilos','formula_id'=>1,'area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Sociable','formula_id'=>2,'area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Intimo','formula_id'=>2,'area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Entusiasta','formula_id'=>3,'area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Calmado','formula_id'=>3,'area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Comunicativo','formula_id'=>4,'area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Reservado','formula_id'=>4,'area_item_id'=>2,'posicion'=>'0'],

            ['nombre'=>'Instintivo','formula_id'=>5,'area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Escéptico','formula_id'=>5,'area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Original','formula_id'=>6,'area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Tradicional','formula_id'=>6,'area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Creativo','formula_id'=>7,'area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Realista','formula_id'=>7,'area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Conceptual','formula_id'=>8,'area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Aplicador','formula_id'=>8,'area_item_id'=>4,'posicion'=>'0'],

            ['nombre'=>'Objetivo','formula_id'=>9,'area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Compasivo','formula_id'=>9,'area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Distante','formula_id'=>10,'area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Susceptible','formula_id'=>10,'area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Cuestionador','formula_id'=>11,'area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Conciliador','formula_id'=>11,'area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Directo','formula_id'=>12,'area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Empático','formula_id'=>12,'area_item_id'=>6,'posicion'=>'0'],

            ['nombre'=>'Planificado','formula_id'=>13,'area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Espontaneo','formula_id'=>13,'area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Metódico','formula_id'=>14,'area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Eventual','formula_id'=>14,'area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Estructurado','formula_id'=>15,'area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Flexible','formula_id'=>15,'area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Cerrar e implementar','formula_id'=>16,'area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Explorar alternativas','formula_id'=>16,'area_item_id'=>8,'posicion'=>'0'],
        ];

        FormulaItem::insert($items);
    }
}
