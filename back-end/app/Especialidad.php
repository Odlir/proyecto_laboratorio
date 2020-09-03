<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Especialidad extends Model
{
    use MyTrait;

    protected $table = 'especialidades';

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->codigo = $model->sinTilde('codigo', $model->codigo);
            $model->nombre = $model->sinTilde('nombre', $model->nombre);

            $model->codigo = $model->setUpperCase('codigo', $model->codigo);
            $model->nombre = $model->setUpperCase('nombre', $model->nombre);
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
