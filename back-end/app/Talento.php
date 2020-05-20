<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talento extends Model
{
    public function tendencia()
    {
        return $this->belongsTo('App\TendenciaTalento');
    }

    public function mas_desarrollado()
    {
        return $this->hasMany('App\TalentoMasDesarrollado');
    }

    public function menos_desarrollado()
    {
        return $this->hasMany('App\TalentoMenosDesarrollado');
    }

    public function mas_e_desarrollado()
    {
        return $this->hasMany('App\TalentoEspecificoMasDesarrollado');
    }

    public function menos_e_desarrollado()
    {
        return $this->hasMany('App\TalentoEspecificoMenosDesarrollado');
    }
}
