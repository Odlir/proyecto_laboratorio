<?php

namespace App\Imports;

use App\Persona;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $user;

    public function __construct($user_id) {
        $this->user = $user_id;
     }

    public function model(array $row)
    {
        return new Persona([
            'nombres'     => $row['nombres'],
            'apellido_paterno'    => $row['apellido_paterno'],
            'apellido_materno' => $row['apellido_materno'],
            'sexo' => $row['sexo'],
            'email' => $row['correo'],
            'rol_id' => 2,
            'insert_user_id' => $this->user
        ]);
    }
}
