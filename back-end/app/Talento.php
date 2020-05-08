<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talento extends Model
{
    public function tendencia()
    {
        return $this->belongsTo('App\TendenciaTalento');
    }
}
