<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoMasDesarrollado extends Model
{
    protected $table = "talento_mas_desarrollado";

    protected $fillable = [
        'talento_id',
        'persona_id',
        'encuesta_id'
    ];
}
