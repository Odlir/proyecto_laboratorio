<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Muestras extends Model
{
    use MyTrait;

    protected $fillable = [
        'nro_muestra',
        'descripcion',
        'p_unitario',
        'observaciones',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->nro_muestra = $model->sinTilde('nro_muestra', $model->nro_muestra);
            $model->descripcion = $model->sinTilde('descripcion', $model->descripcion);
            $model->p_unitario = $model->sinTilde('p_unitario', $model->p_unitario);
            $model->observaciones = $model->sinTilde('observaciones', $model->observaciones);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->nro_muestra = $model->setUpperCase('nro_muestra', $model->nro_muestra);
            $model->descripcion = $model->setUpperCase('descripcion', $model->descripcion);
            $model->p_unitario = $model->setUpperCase('p_unitario', $model->p_unitario);
            $model->observaciones = $model->setUpperCase('observaciones', $model->observaciones);
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
