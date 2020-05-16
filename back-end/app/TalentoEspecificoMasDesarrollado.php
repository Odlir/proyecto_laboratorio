<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoEspecificoMasDesarrollado extends Model
{
    protected $table = "talento_e_mas_desarrollado";

    protected $fillable = [
        'talento_id',
        'encuesta_puntaje_id'
    ];
}
