<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Analisis extends Model
{
    use MyTrait;

    protected $fillable = [
        'nro_analisis',
        'descripcion',
        'p_unitario',
        'observaciones',
        'fecha_hora_creacion',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->nro_analisis = $model->sinTilde('nro_analisis', $model->nro_analisis);
            $model->descripcion = $model->sinTilde('descripcion', $model->descripcion);
            $model->p_unitario = $model->sinTilde('p_unitario', $model->p_unitario);
            $model->observaciones = $model->sinTilde('observaciones', $model->observaciones);
            $model->fecha_hora_atencion = $model->sinTilde('fecha_hora_atencion', $model->fecha_hora_atencion);

            $model->nro_analisis = $model->setUpperCase('nro_analisis', $model->nro_analisis);
            $model->descripcion = $model->setUpperCase('descripcion', $model->descripcion);
            $model->p_unitario = $model->setUpperCase('p_unitario', $model->p_unitario);
            $model->observaciones = $model->setUpperCase('observaciones', $model->observaciones);
            $model->fecha_hora_atencion = $model->setUpperCase('fecha_hora_atencion', $model->fecha_hora_atencion);
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
