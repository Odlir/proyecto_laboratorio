<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencionAnalisisTipoAnalisis extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion_analisis_tipo_analisis';
    
    protected $fillable = [
        'analisis',
        'cantidad',
        'p_unitario',
        'total',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->analisis = $model->sinTilde('analisis', $model->analisis);
            $model->cantidad = $model->sinTilde('cantidad', $model->cantidad);
            $model->p_unitario = $model->sinTilde('p_unitario', $model->p_unitario);
            $model->total = $model->sinTilde('total', $model->total);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->analisis = $model->setUpperCase('analisis', $model->analisis);
            $model->cantidad = $model->setUpperCase('cantidad', $model->cantidad);
            $model->p_unitario = $model->setUpperCase('p_unitario', $model->p_unitario);
            $model->total = $model->setUpperCase('total', $model->total);
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
