<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MyTrait;

class Empresa extends Model
{
    use MyTrait;

    protected $fillable = [
        'nro_ruc',
        'razon_social',
        'pag_web',
        'latitud',
        'longitud',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'telf_fijo',
        'nro_celular',
        'nombre_contacto1',
        'telf_fijo1',
        'nro_celular1',
        'email_contacto1',
        'nombre_contacto2',
        'telf_fijo2',
        'nro_celular2',
        'email_contacto2',
        'nombre_banco',
        'nro_cta',
        'nro_cta_interbancaria',
        'observaciones1',
        'observaciones2',
        'estado',        
        'insert_user_id',
        'edit_user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->nro_ruc = $model->sinTilde('nro_ruc', $model->nro_ruc);
            $model->razon_social = $model->sinTilde('razon_social', $model->razon_social);
            $model->pag_web = $model->sinTilde('pag_web', $model->pag_web);
            $model->latitud = $model->sinTilde('latitud', $model->latitud);
            $model->longitud = $model->sinTilde('longitud', $model->longitud);
            $model->direccion = $model->sinTilde('direccion', $model->direccion);
            $model->departamento = $model->sinTilde('departamento', $model->departamento);
            $model->provincia = $model->sinTilde('provincia', $model->provincia);
            $model->distrito = $model->sinTilde('distrito', $model->distrito);
            $model->telf_fijo = $model->sinTilde('telf_fijo', $model->telf_fijo);
            $model->nro_celular = $model->sinTilde('nro_celular', $model->nro_celular);
            $model->nombre_contacto1 = $model->sinTilde('nombre_contacto1', $model->nombre_contacto1);
            $model->telf_fijo1 = $model->sinTilde('telf_fijo1', $model->telf_fijo1);
            $model->nro_celular1 = $model->sinTilde('nro_celular1', $model->nro_celular1);
            $model->email_contacto1 = $model->sinTilde('email_contacto1', $model->email_contacto1);
            $model->nombre_contacto2 = $model->sinTilde('nombre_contacto2', $model->nombre_contacto2);
            $model->telf_fijo2 = $model->sinTilde('telf_fijo2', $model->telf_fijo2);
            $model->nro_celular2 = $model->sinTilde('nro_celular2', $model->nro_celular2);
            $model->email_contacto2 = $model->sinTilde('email_contacto2', $model->email_contacto2);
            $model->nombre_banco = $model->sinTilde('nombre_banco', $model->nombre_banco);
            $model->nro_cta = $model->sinTilde('nro_cta', $model->nro_cuenta);
            $model->nro_cta_interbancaria = $model->sinTilde('nro_cta_interbancaria', $model->nro_cta_interbancaria);
            $model->observaciones1 = $model->sinTilde('observaciones1', $model->observaciones1);
            $model->observaciones2 = $model->sinTilde('observaciones2', $model->observaciones2);
            $model->estado = $model->sinTilde('estado', $model->estado);
            
            $model->nro_ruc = $model->setUpperCase('nro_ruc', $model->nro_ruc);
            $model->razon_social = $model->setUpperCase('razon_social', $model->razon_social);
            $model->pag_web = $model->setUpperCase('pag_web', $model->pag_web);
            $model->latitud = $model->setUpperCase('latitud', $model->latitud);
            $model->longitud = $model->setUpperCase('longitud', $model->longitud);
            $model->direccion = $model->setUpperCase('direccion', $model->direccion);
            $model->departamento = $model->setUpperCase('departamento', $model->departamento);
            $model->provincia = $model->setUpperCase('provincia', $model->provincia);
            $model->distrito = $model->setUpperCase('distrito', $model->distrito);
            $model->telf_fijo = $model->setUpperCase('telf_fijo', $model->telf_fijo);
            $model->nro_celular = $model->setUpperCase('nro_celular', $model->nro_celular);
            $model->nombre_contacto1 = $model->setUpperCase('nombre_contacto1', $model->nombre_contacto1);
            $model->telf_fijo1 = $model->setUpperCase('telf_fijo1', $model->telf_fijo1);
            $model->nro_celular1 = $model->setUpperCase('nro_celular1', $model->nro_celular1);
            $model->email_contacto1 = $model->setUpperCase('email_contacto1', $model->email_contacto1);
            $model->nombre_contacto2 = $model->setUpperCase('nombre_contacto2', $model->nombre_contacto2);
            $model->telf_fijo2 = $model->setUpperCase('telf_fijo2', $model->telf_fijo2);
            $model->nro_celular2 = $model->setUpperCase('nro_celular2', $model->nro_celular2);
            $model->email_contacto2 = $model->setUpperCase('email_contacto2', $model->email_contacto2);
            $model->nombre_banco = $model->setUpperCase('nombre_banco', $model->nombre_banco);
            $model->nro_cta = $model->setUpperCase('nro_cta', $model->nro_cuenta);
            $model->nro_cta_interbancaria = $model->setUpperCase('nro_cta_interbancaria', $model->nro_cta_interbancaria);
            $model->observaciones1 = $model->setUpperCase('observaciones1', $model->observaciones1);
            $model->observaciones2 = $model->setUpperCase('observaciones2', $model->observaciones2);
            $model->estado = $model->setUpperCase('estado', $model->estado);
        });
    }

    public function sucursales()
    {
        return $this->hasMany('App\EmpresaSucursal');
    }

    public function insert()
    {
        return $this->belongsTo('App\User', 'insert_user_id');
    }

    public function edit()
    {
        return $this->belongsTo('App\User', 'edit_user_id');
    }
}
