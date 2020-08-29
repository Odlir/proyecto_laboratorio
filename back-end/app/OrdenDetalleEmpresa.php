<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenDetalleEmpresa extends Model
{
    use MyTrait;

    protected $table = 'orden_detalle_empresa';
    
    protected $fillable = [
        'empleados',
        'estado',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->empleados = $model->sinTilde('empleados', $model->empleados);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->empleados = $model->setUpperCase('empleados', $model->empleados);
            $model->estado = $model->setUpperCase('estado', $model->estado);
        });
    }

    protected $appends = ['apellidos','nombrecompleto'];

    public function getNombreCompletoAttribute($value)
    {
        return $this->nombres . " " . $this->apellido_paterno . " " . $this->apellido_materno;
    }

    public function getApellidosAttribute($value)
    {
        return $this->apellido_paterno . " " . $this->apellido_materno;
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function insert()
    {
        return $this->belongsTo('App\User', 'insert_user_id');
    }

    public function edit()
    {
        return $this->belongsTo('App\User', 'edit_user_id');
    }

    public function encuestas()
    {
        return $this->belongsToMany('App\Encuesta')->withPivot(["id"]);
    }
}
