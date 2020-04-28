<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormulaPuntaje extends Model
{
    protected $table = "formula_puntaje";

    protected $fillable = [
        'encuesta_puntaje_id',
        'formula_id',
        'puntaje',
        'transformacion'
    ];

    public function formula()
    {
        return $this->belongsTo('App\Formula');
    }
}
