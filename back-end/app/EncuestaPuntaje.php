<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaPuntaje extends Model
{
    protected $table = "encuesta_puntaje";

    protected $fillable = [
        'persona_id',
        'encuesta_id',
        'carrera_id',
        'puntaje'
    ];
}
