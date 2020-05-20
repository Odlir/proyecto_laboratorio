<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentoMenosDesarrollado extends Model
{
    protected $table = "talento_menos_desarrollado";

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
