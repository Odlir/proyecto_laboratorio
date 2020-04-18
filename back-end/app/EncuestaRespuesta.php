<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaRespuesta extends Model
{
    protected $table = "encuesta_respuesta";

    protected $fillable = [
        'estado',
        'pregunta_id',
        'subpregunta_id',
        'respuesta_id',
        'persona_id',
        'encuesta_id'
    ];
}
