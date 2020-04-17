<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Empresa extends Model
{
    use MyTrait;

    protected $fillable = [
        'razon_social',
        'contacto',
        'email',
        'telefono',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
	{   parent::boot();
		static::saving(function ($model) {
            $model->razon_social = $model->setUpperCase('razon_social',$model->razon_social);
            $model->contacto = $model->setUpperCase('contacto',$model->contacto);

            $model->razon_social = $model->sinTilde('razon_social',$model->razon_social);
            $model->contacto = $model->sinTilde('contacto',$model->contacto);
        });
    }

    public function sucursales()
    {
        return $this->hasMany('App\EmpresaSucursal');
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
