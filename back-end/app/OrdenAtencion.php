<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencion extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion';
    
    protected $fillable = [
        'nro_atencion',
        'paciente',
        'analisis',
        'estado_oa',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->nro_atencion = $model->sinTilde('nro_atencion', $model->nro_atencion);
            $model->paciente = $model->sinTilde('paciente', $model->paciente);
            $model->analisis = $model->sinTilde('analisis', $model->analisis);
            $model->estado_oa = $model->sinTilde('estado_oa', $model->estado_oa);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->nro_atencion = $model->setUpperCase('nro_atencion', $model->nro_atencion);
            $model->paciente = $model->setUpperCase('paciente', $model->paciente);
            $model->analisis = $model->setUpperCase('analisis', $model->analisis);
            $model->estado_oa = $model->setUpperCase('estado_oa', $model->estado_oa);
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
