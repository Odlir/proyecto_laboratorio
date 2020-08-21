<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencion extends Model
{
    use MyTrait;

    protected $fillable = [
        'nro_atencion',
        'fecha_atencion',
        'hora_atencion',
        'paciente',
        'analisis',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->nro_analisis = $model->sinTilde('nro_analisis', $model->nro_analisis);
            $model->fecha_atencion = $model->sinTilde('fecha_atencion', $model->fecha_atencion);
            $model->hora_atencion = $model->sinTilde('hora_atencion', $model->hora_atencion);
            $model->paciente = $model->sinTilde('paciente', $model->paciente);
            $model->analisis = $model->sinTilde('analisis', $model->analisis);

            $model->nro_analisis = $model->setUpperCase('nro_analisis', $model->nro_analisis);
            $model->fecha_atencion = $model->setUpperCase('fecha_atencion', $model->fecha_atencion);
            $model->hora_atencion = $model->setUpperCase('hora_atencion', $model->hora_atencion);
            $model->paciente = $model->setUpperCase('paciente', $model->paciente);
            $model->analisis = $model->setUpperCase('analisis', $model->analisis);
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
