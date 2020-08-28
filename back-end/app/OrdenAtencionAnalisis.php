<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class OrdenAtencionAnalisis extends Model
{
    use MyTrait;

    protected $table = 'orden_atencion_analisis';
    
    protected $fillable = [
        'analisis',
        'muestras',
        'fecha_hora_atencion',
        'forma_pago',
        'factura_boleta',
        'estado_analisis',
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
            $model->muestras = $model->sinTilde('muestras', $model->muestras);
            $model->fecha_hora_atencion = $model->sinTilde('fecha_hora_atencion', $model->fecha_hora_atencion);
            $model->forma_pago = $model->sinTilde('forma_pago', $model->forma_pago);
            $model->factura_boleta = $model->sinTilde('factura_boleta', $model->factura_boleta);
            $model->estado_analisis = $model->sinTilde('estado_analisis', $model->estado_analisis);
            $model->estado = $model->sinTilde('estado', $model->estado);

            $model->analisis = $model->setUpperCase('analisis', $model->analisis);
            $model->muestras = $model->setUpperCase('muestras', $model->muestras);
            $model->fecha_hora_atencion = $model->setUpperCase('fecha_hora_atencion', $model->fecha_hora_atencion);
            $model->forma_pago = $model->setUpperCase('forma_pago', $model->forma_pago);
            $model->factura_boleta = $model->setUpperCase('factura_boleta', $model->factura_boleta);
            $model->estado_analisis = $model->setUpperCase('estado_analisis', $model->estado_analisis);
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
