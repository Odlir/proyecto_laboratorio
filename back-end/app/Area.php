<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function items()
    {
        return $this->hasMany('App\AreaItem');
    }

    public function formulas()
    {
        return $this->hasMany('App\Formula');
    }
}
