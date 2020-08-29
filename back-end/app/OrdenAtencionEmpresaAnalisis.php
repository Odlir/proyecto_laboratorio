<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencionEmpresaAnalisis extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion_empresa_analisis';
    
    protected $fillable = [
        'paciente_id',
        'fecha_registro',
        'oa_empresa_id',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->paciente_id = $model->sinTilde('paciente_id', $model->paciente_id);
            $model->fecha_registro = $model->sinTilde('fecha_registro', $model->fecha_registro);
            $model->oa_empresa_id = $model->sinTilde('oa_empresa_id', $model->oa_empresa_id);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->paciente_id = $model->setUpperCase('paciente_id', $model->paciente_id);
            $model->fecha_registro = $model->setUpperCase('fecha_registro', $model->fecha_registro);
            $model->oa_empresa_id = $model->setUpperCase('oa_empresa_id', $model->oa_empresa_id);
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
