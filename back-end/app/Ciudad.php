<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";

    public function pais()
    {
        return $this->belongsTo('App\Pais','country_id','id');
    }
}
