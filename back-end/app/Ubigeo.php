<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Ubigeo extends Model
{
    use MyTrait;

    protected $table = 'ubigeo';

    protected $fillable = [
        'ubigeo',
        'distrito',
        'provincia',
        'departamento'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->ubigeo = $model->sinTilde('ubigeo', $model->ubigeo);
            $model->distrito = $model->sinTilde('distrito', $model->distrito);
            $model->provincia = $model->sinTilde('provincia', $model->provincia);
            $model->departamento = $model->sinTilde('departamento', $model->departamento);

            $model->ubigeo = $model->setUpperCase('ubigeo', $model->ubigeo);
            $model->distrito = $model->setUpperCase('distrito', $model->distrito);
            $model->provincia = $model->setUpperCase('provincia', $model->provincia);
            $model->departamento = $model->setUpperCase('departamento', $model->departamento);
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
