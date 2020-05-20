<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoEspecificoMenosDesarrollado extends Model
{
    protected $table = "talento_e_menos_desarrollado";

    protected $fillable = [
        'talento_id',
        'persona_id',
        'encuesta_id'
    ];

    public function talento()
    {
        return $this->belongsTo('App\Talento', 'talento_id');
    }
}
