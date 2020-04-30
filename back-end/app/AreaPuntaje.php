<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaPuntaje extends Model
{
    protected $table = "area_puntaje";

    protected $fillable = [
        'encuesta_puntaje_id',
        'area_id',
        'puntaje',
        'letra',
        'palabra'
    ];
}
