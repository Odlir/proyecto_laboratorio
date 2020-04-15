<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class EncuestaPersona extends Model
{
    protected $table="encuesta_persona";

    use MyTrait;

    protected $fillable = [
        'estado',
        'persona_id',
        'encuesta_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }

    public function insert()
    {
        return $this->belongsTo('App\User','insert_user_id');
    }

    public function edit()
    {
        return $this->belongsTo('App\User','edit_user_id');
    }
}
