<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraPuntaje extends Model
{
    protected $table = "carrera_puntaje";

    protected $fillable = [
        'encuesta_puntaje_id',
        'carrera_id',
        'puntaje'
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }
}
