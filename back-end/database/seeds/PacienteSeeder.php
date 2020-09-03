<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacientes = array(
            array('id' => 1,'tipo_documento' => 1,'nro_documento' => 98765432,'nombres' => "Luis",'apellido_materno' => "Meza",'apellido_paterno' => "Torres",'fecha_nacimiento' => "1994-08-15",'edad' => 22,'sexo' => 1,'nro_celular' => 996666364,'email' => "luismt@gmail.com",'grupo_sanguineo' => "AB",'direccion' => "jr. lirios 666",'referencias' => "Cerca a la avenida 28",'tipo_paciente' => 1,'observaciones' => "desc",'estado' => 1,'ubigeo_id' => 1,'rol_id' => 2,'insert_user_id' => 1,'edit_user_id' => 1),
            );
            DB::table('personas')->insert($pacientes);
    }
}