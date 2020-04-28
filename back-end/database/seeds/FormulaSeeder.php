<?php

use App\Formula;
use Illuminate\Database\Seeder;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulas=[
            ['nombre'=>'Ambientes dinámicos-Ambientes tranquilos','area_id'=>1],
            ['nombre'=>'Sociable-Intimo','area_id'=>1],
            ['nombre'=>'Entusiasta-Calmado','area_id'=>1],
            ['nombre'=>'Comunicativo-Reservado','area_id'=>1],

            ['nombre'=>'Instintivo-Escéptico','area_id'=>2],
            ['nombre'=>'Original-Tradicional','area_id'=>2],
            ['nombre'=>'Creativo-Realista','area_id'=>2],
            ['nombre'=>'Conceptual-Aplicador','area_id'=>2],

            ['nombre'=>'Objetivo-Compasivo','area_id'=>3],
            ['nombre'=>'Distante-Susceptible','area_id'=>3],
            ['nombre'=>'Cuestionador-Conciliador','area_id'=>3],
            ['nombre'=>'Directo-Empático','area_id'=>3],

            ['nombre'=>'Planificado-Espontaneo','area_id'=>4],
            ['nombre'=>'Metódico-Eventual','area_id'=>4],
            ['nombre'=>'Estructurado-Flexible','area_id'=>4],
            ['nombre'=>'Cerrar-Implementar','area_id'=>4],
        ];

        Formula::insert($formulas);
    }
}
