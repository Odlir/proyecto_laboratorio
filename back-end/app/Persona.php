<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Persona extends Model
{
    use MyTrait;

    protected $guarded=[];

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
}
