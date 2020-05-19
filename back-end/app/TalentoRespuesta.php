<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoRespuesta extends Model
{
    protected $table = "talento_respuesta";

    protected $fillable = [
        'talento_id',
        'tipo',
        'persona_id',
        'encuesta_id'
    ];

    public function talento()
    {
        return $this->belongsTo('App\Talento', 'talento_id');
    }
}
