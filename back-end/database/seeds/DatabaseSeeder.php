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
        $this->call(PaisSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoEncuestaSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(SubPreguntaSeeder::class);
        $this->call(RespuestasSeeder::class);
    }
}
