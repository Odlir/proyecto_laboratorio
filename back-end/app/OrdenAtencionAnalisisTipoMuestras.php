<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencionAnalisisTipoMuestras extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion_analisis_tipo_muestras';
    
    protected $fillable = [
        'muestra',
        'cantidad',
        'fecha_muestra',
        'fecha_entrega',
        'estado',
        'rol_id',
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->muestra = $model->sinTilde('muestra', $model->muestra);
            $model->cantidad = $model->sinTilde('cantidad', $model->cantidad);
            $model->fecha_muestra = $model->sinTilde('fecha_muestra', $model->fecha_muestra);
            $model->fecha_entrega = $model->sinTilde('fecha_entrega', $model->fecha_entrega);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->muestra = $model->setUpperCase('muestra', $model->muestra);
            $model->cantidad = $model->setUpperCase('cantidad', $model->cantidad);
            $model->fecha_muestra = $model->setUpperCase('fecha_muestra', $model->fecha_muestra);
            $model->fecha_entrega = $model->setUpperCase('fecha_entrega', $model->fecha_entrega);
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
