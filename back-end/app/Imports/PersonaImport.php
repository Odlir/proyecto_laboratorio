<?php

namespace App\Imports;

use App\Persona;
use App\EncuestaPersona;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class PersonaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $user;
    private $encuesta_id;

    public function __construct($user_id,$encuesta_id) {
        $this->user = $user_id;
        $this->encuesta_id = $encuesta_id;
     }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $persona= Persona::create([
                'nombres'     => $row['nombres'],
                'apellido_paterno'    => $row['apellido_paterno'],
                'apellido_materno' => $row['apellido_materno'],
                'sexo' => $row['sexo'],
                'email' => $row['correo'],
                'rol_id' => 2,
                'insert_user_id' => $this->user
            ]);

            EncuestaPersona::create([
                'persona_id'     => $persona->id,
                'encuesta_id'    => $this->encuesta_id,
                'insert_user_id' => $this->user
            ]);
        }
    }
}
