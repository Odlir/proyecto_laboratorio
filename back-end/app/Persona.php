<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Persona extends Model
{
    use MyTrait;

    protected $fillable = [
        'tipo_documento',
        'nro_documento',
        'nombres',
        'apellido_materno',
        'apellido_paterno',
        'fecha_nacimiento',
        'edad',
        'sexo',
        'nro_celular',
        'email',
        'grupo_sanguineo',
        'direccion',
        'referencias',
        'tipo_paciente',
        'observaciones',
        'estado',
        'ubigeo_id',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->tipo_documento = $model->sinTilde('tipo_documento', $model->tipo_documento);
            $model->nro_documento = $model->sinTilde('nro_documento', $model->nro_documento);
            $model->nombres = $model->sinTilde('nombres', $model->nombres);
            $model->apellido_materno = $model->sinTilde('apellido_materno', $model->apellido_materno);
            $model->apellido_paterno = $model->sinTilde('apellido_paterno', $model->apellido_paterno);
            $model->fecha_nacimiento = $model->sinTilde('fecha_nacimiento', $model->fecha_nacimiento);
            $model->edad = $model->sinTilde('edad', $model->edad);
            $model->sexo = $model->sinTilde('sexo', $model->sexo);
            $model->nro_celular = $model->sinTilde('nro_celular', $model->nro_celular);
            $model->email = $model->sinTilde('email', $model->email);
            $model->grupo_sanguineo = $model->sinTilde('grupo_sanguineo', $model->grupo_sanguineo);
            $model->direccion = $model->sinTilde('direccion', $model->direccion);
            $model->referencias = $model->sinTilde('referencias', $model->referencias);
            $model->tipo_paciente = $model->sinTilde('tipo_paciente', $model->tipo_paciente);
            $model->observaciones = $model->sinTilde('observaciones', $model->observaciones);
            $model->estado = $model->sinTilde('estado', $model->estado);
            $model->ubigeo_id = $model->sinTilde('ubigeo_id', $model->ubigeo_id);

            $model->tipo_documento = $model->setUpperCase('tipo_documento', $model->tipo_documento);
            $model->nro_documento = $model->setUpperCase('nro_documento', $model->nro_documento);
            $model->nombres = $model->setUpperCase('nombres', $model->nombres);
            $model->apellido_materno = $model->setUpperCase('apellido_materno', $model->apellido_materno);
            $model->apellido_paterno = $model->setUpperCase('apellido_paterno', $model->apellido_paterno);
            $model->fecha_nacimiento = $model->setUpperCase('fecha_nacimiento', $model->fecha_nacimiento);
            $model->edad = $model->setUpperCase('edad', $model->edad);
            $model->sexo = $model->setUpperCase('sexo', $model->sexo);
            $model->nro_celular = $model->setUpperCase('nro_celular', $model->nro_celular);
            $model->email = $model->setUpperCase('email', $model->email);
            $model->grupo_sanguineo = $model->setUpperCase('grupo_sanguineo', $model->grupo_sanguineo);
            $model->direccion = $model->setUpperCase('direccion', $model->direccion);
            $model->referencias = $model->setUpperCase('referencias', $model->referencias);
            $model->tipo_paciente = $model->setUpperCase('tipo_paciente', $model->tipo_paciente);
            $model->observaciones = $model->setUpperCase('observaciones', $model->observaciones);
            $model->estado = $model->setUpperCase('estado', $model->estado);
            $model->ubigeo_id = $model->setUpperCase('ubigeo_id', $model->ubigeo_id);
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
