<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoRespuesta extends Model
{
    protected $table = "talento_respuesta";

    protected $fillable = [
        'talento_id',
        'tipo',
        'encuesta_puntaje_id',
    ];
}
