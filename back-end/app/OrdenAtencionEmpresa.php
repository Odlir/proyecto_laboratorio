<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencionEmpresa extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion_empresa';
    
    protected $fillable = [
        'nro_orden',
        'fecha_registro',
        'fecha_actualizacion',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->nro_orden = $model->sinTilde('nro_orden', $model->nro_orden);
            $model->fecha_registro = $model->sinTilde('fecha_registro', $model->fecha_registro);
            $model->fecha_actualizacion = $model->sinTilde('fecha_actualizacion', $model->fecha_actualizacion);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->nro_orden = $model->setUpperCase('nro_orden', $model->nro_orden);
            $model->fecha_registro = $model->setUpperCase('fecha_registro', $model->fecha_registro);
            $model->fecha_actualizacion = $model->setUpperCase('fecha_actualizacion', $model->fecha_actualizacion);
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
