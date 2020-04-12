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

    protected $casts = [
        'created_at' => 'datetime:d/m/y - H:i',
        'updated_at' => 'datetime:d/m/y - H:i'
    ];

    public static function boot()
	{   parent::boot();
		static::saving(function ($model) {
            $model->nombre = $model->setUpperCase('nombre',$model->nombre);
            $model->nombre = $model->sinTilde('nombre',$model->nombre);
        });
    }
}
