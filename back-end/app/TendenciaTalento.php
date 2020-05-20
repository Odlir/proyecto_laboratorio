<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TendenciaTalento extends Model
{
    protected $table = "tendencia_talento";

    public function talentos()
    {
        return $this->hasMany('App\Talento','tendencia_id');
    }
}
