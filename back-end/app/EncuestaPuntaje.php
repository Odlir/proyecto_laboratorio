<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaPuntaje extends Model
{
    protected $table = "encuesta_puntaje";

    protected $fillable = [
        'persona_id',
        'encuesta_id'
    ];

    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function puntajes()
    {
        return $this->hasMany('App\CarreraPuntaje','encuesta_puntaje_id');
    }
}
