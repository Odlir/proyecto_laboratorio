<?php

use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = array(
            array('id' => 1,'codigo' => 'AN' ,'nombre' => "Anestesiología"),
            array('id' => 2,'codigo' => 'OT' ,'nombre' => "Otorrinolaringología"),
            array('id' => 3,'codigo' => 'EN' ,'nombre' => "Endocrinología"),
            array('id' => 4,'codigo' => 'TR' ,'nombre' => "Traumatología"),
            array('id' => 5,'codigo' => 'NE' ,'nombre' => "Neurología"),
            array('id' => 6,'codigo' => 'GO' ,'nombre' => "Gineco-Obstetricia"),
            array('id' => 7,'codigo' => 'CG' ,'nombre' => "Cirugía General"),
            array('id' => 8,'codigo' => 'DE' ,'nombre' => "Dermatología"),
            array('id' => 9,'codigo' => 'CA' ,'nombre' => "Cardiología"),
            array('id' => 10,'codigo' => 'PE' ,'nombre' => "Pediatría"),
            );
            DB::table('especialidades')->insert($especialidades);
    }
}
