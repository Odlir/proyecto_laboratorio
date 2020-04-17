<?php

use Illuminate\Database\Seeder;

class TipoEncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_encuesta')->insert([
            'nombre' => 'Intereses',
        ]);

        DB::table('tipo_encuesta')->insert([
            'nombre' => 'Talentos',
        ]);

        DB::table('tipo_encuesta')->insert([
            'nombre' => 'Temperamentos',
        ]);
    }
}
