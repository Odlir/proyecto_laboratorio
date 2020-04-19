<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Encuesta extends Model
{
    use MyTrait;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'empresa_sucursal_id',
        'tipo_encuesta_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public function empresa()
    {
        return $this->belongsTo('App\EmpresaSucursal', 'empresa_sucursal_id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoEncuesta', 'tipo_encuesta_id');
    }

    public function insert()
    {
        return $this->belongsTo('App\User', 'insert_user_id');
    }

    public function edit()
    {
        return $this->belongsTo('App\User', 'edit_user_id');
    }

    public function personas()
    {
        return $this->belongsToMany('App\Persona')->withPivot(["id"]);
    }
}
