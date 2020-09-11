<?php

namespace App\Imports;

use App\Doctores;
use App\EncuestaDoctor;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class DoctorImport implements ToCollection, WithHeadingRow
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

        foreach ($rows as $row) {
            $doctor = Doctores::create([
                'firma' => $row['firma'],
                'rol_id' => 2,
                'insert_user_id' => $this->user
            ]);

            EncuestaDoctor::create([
                'doctor_id'     => $doctor->id,
                'firma'    => $this->encuesta_id,
                'insert_user_id' => $this->user
            ]);
        }
    }
}
