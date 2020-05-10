<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function intereses()
    {
        return $this->hasMany('App\CarreraInteres');
    }
}
