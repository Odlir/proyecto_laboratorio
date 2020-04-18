<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class EmpresaSucursal extends Model
{
    use MyTrait;
    protected $table="empresa_sucursal";

    protected $fillable = [
        'nombre',
        'empresa_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
	{   parent::boot();
		static::saving(function ($model) {
            $model->nombre = $model->setUpperCase('nombre',$model->nombre);
            $model->nombre = $model->sinTilde('nombre',$model->nombre);
        });
    }

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
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
        return $this->hasMany('App\Encuesta');
    }
}
