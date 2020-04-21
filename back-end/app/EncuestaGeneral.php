<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class EncuestaGeneral extends Model
{
    use MyTrait;

    protected $table = "encuesta_general";

    protected $fillable = [
        'estado',
        'insert_user_id',
        'edit_user_id'
    ];

    public function personas()
    {
        return $this->belongsToMany('App\Persona','encuesta_persona')->withPivot(["id","estado"]);
    }
}
