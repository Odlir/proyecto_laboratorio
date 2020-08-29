<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenDetalleAnalisis extends Model
{
    use MyTrait;

    protected $table = 'orden_detalle_analisis';
    
    protected $fillable = [
        'tipo_analisis',
        'estado',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->tipo_analisis = $model->sinTilde('tipo_analisis', $model->tipo_analisis);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->tipo_analisis = $model->setUpperCase('tipo_analisis', $model->tipo_analisis);
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
