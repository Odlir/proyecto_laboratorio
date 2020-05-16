<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoEspecificoMenosDesarrollado extends Model
{
    protected $table = "talento_e_menos_desarrollado";

    protected $fillable = [
        'talento_id',
        'encuesta_puntaje_id'
    ];
}
