<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(AreaSeeder::class);
        $this->call(AreaItemSeeder::class);
        $this->call(FormulaSeeder::class);
        $this->call(FormulaItemSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(CarreraInteresSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoEncuestaSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(SubPreguntaSeeder::class);
        $this->call(RespuestasSeeder::class);
        $this->call(TipoTalentoSeeder::class);
        $this->call(TendenciaTalentoSeeder::class);
        $this->call(TalentosSeeder::class);
        $this->call(RuedaSeeder::class);
    }
}
