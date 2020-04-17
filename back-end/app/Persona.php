<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Persona extends Model
{
    use MyTrait;

    protected $fillable = [
        'nombres',
        'apellido_materno',
        'apellido_paterno',
        'sexo',
        'estado',
        'email',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
	{   parent::boot();
		static::saving(function ($model) {
            $model->nombres = $model->setUpperCase('nombres',$model->nombres);
            $model->apellido_materno = $model->setUpperCase('apellido_materno',$model->apellido_materno);
            $model->apellido_paterno = $model->setUpperCase('apellido_paterno',$model->apellido_paterno);
            $model->sexo = $model->setUpperCase('sexo',$model->sexo);

            $model->nombres = $model->sinTilde('nombres',$model->nombres);
            $model->apellido_materno = $model->sinTilde('apellido_materno',$model->apellido_materno);
            $model->apellido_paterno = $model->sinTilde('apellido_paterno',$model->apellido_paterno);
            $model->sexo = $model->sinTilde('sexo',$model->sexo);
        });
    }

    protected $appends = ['apellidos'];

    public function getApellidosAttribute($value)
    {
        return $this->apellido_paterno." ".$this->apellido_materno;
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function insert()
    {
        return $this->belongsTo('App\User','insert_user_id');
    }

    public function edit()
    {
        return $this->belongsTo('App\User','edit_user_id');
    }

    public function encuestas()
    {
        return $this->belongsToMany('App\Encuesta')->withPivot(["id"]);
    }
}
