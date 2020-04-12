<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class EmpresaSucursal extends Model
{
    use MyTrait;
    protected $table="empresa_sucursal";

    protected $fillable = [
        'codigo',
        'nombre',
        'direccion',
        'telefono',
        'pais_id',
        'ciudad_id',
        'empresa_id',
        'insert_user_id',
        'edit_user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/y - H:i',
        'updated_at' => 'datetime:d/m/y - H:i'
    ];

    public static function boot()
	{   parent::boot();
		static::saving(function ($model) {
            $model->codigo = $model->setUpperCase('codigo',$model->codigo);
            $model->nombre = $model->setUpperCase('nombre',$model->nombre);
            $model->direccion = $model->setUpperCase('direccion',$model->direccion);

            $model->codigo = $model->sinTilde('codigo',$model->codigo);
            $model->nombre = $model->sinTilde('nombre',$model->nombre);
            $model->direccion = $model->sinTilde('direccion',$model->direccion);
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
}
