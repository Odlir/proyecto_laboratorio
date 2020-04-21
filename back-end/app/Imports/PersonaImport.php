<?php

namespace App\Imports;

use App\Persona;
use App\EncuestaPersona;
use Illuminate\Support\Facades\Validator;
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
    // private $todas;

    public function __construct($user_id, $encuesta_id)
    {
        $this->user = $user_id;
        $this->encuesta_id = $encuesta_id;
        // $this->todas = $todas;
    }

    public function collection(Collection $rows)
    {
        $messages = [];

        $i = 2;
        foreach ($rows as $key => $value) {

            $messages[$key . '.nombres' . '.required'] = 'El campo Nombres, fila ' . $i . '  es requerido.';
            $messages[$key . '.apellido_paterno' . '.required'] = 'El campo Apellido Paterno, fila ' . $i . '  es requerido.';
            $messages[$key . '.sexo' . '.required'] = 'El campo Sexo, fila ' . $i . '  es requerido.';
            $messages[$key . '.ano' . '.alpha_num'] = 'El campo Año, fila ' . $i . '  solo permite numeros y letras.';
            $i++;
        }

        Validator::make($rows->toArray(), [
            '*.nombres' => 'required',
            '*.apellido_paterno' => 'required',
            '*.sexo' => 'required',
            '*.ano' => 'alpha_num|nullable'
        ], $messages)->validate();

        foreach ($rows as $row) {
            $persona = Persona::create([
                'nombres'     => $row['nombres'],
                'apellido_paterno'    => $row['apellido_paterno'],
                'apellido_materno' => $row['apellido_materno'],
                'sexo' => $row['sexo'],
                'anio' => $row['ano'],
                'rol_id' => 2,
                'insert_user_id' => $this->user
            ]);

            // if ($this->todas) {
            //     $var=explode(',',$this->encuesta_id);
            //     foreach ($var as $e) {
            //         EncuestaPersona::create([
            //             'persona_id'     => $persona->id,
            //             'encuesta_id'    => $e,
            //             'insert_user_id' => $this->user
            //         ]);
            //     }
            // } else {
            //     EncuestaPersona::create([
            //         'persona_id'     => $persona->id,
            //         'encuesta_id'    => $this->encuesta_id,
            //         'insert_user_id' => $this->user
            //     ]);
            // }

            EncuestaPersona::create([
                'persona_id'     => $persona->id,
                'encuesta_general_id'    => $this->encuesta_id,
                'insert_user_id' => $this->user
            ]);
        }
    }
}
