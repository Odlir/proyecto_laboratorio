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
        'direccion',
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
        'observaciones',
        'estado',
        'ubigeo_id',
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
            $model->direccion = $model->sinTilde('direccion', $model->direccion);
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
            $model->nro_cta = $model->sinTilde('nro_cta', $model->nro_cta);
            $model->nro_cta_interbancaria = $model->sinTilde('nro_cta_interbancaria', $model->nro_cta_interbancaria);
            $model->observaciones = $model->sinTilde('observaciones', $model->observaciones);
            $model->estado = $model->sinTilde('estado', $model->estado);
            $model->ubigeo_id = $model->sinTilde('ubigeo_id', $model->ubigeo_id);

            $model->nro_ruc = $model->setUpperCase('nro_ruc', $model->nro_ruc);
            $model->razon_social = $model->setUpperCase('razon_social', $model->razon_social);
            $model->pag_web = $model->setUpperCase('pag_web', $model->pag_web);
            $model->direccion = $model->setUpperCase('direccion', $model->direccion);
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
            $model->nro_cta = $model->setUpperCase('nro_cta', $model->nro_cta);
            $model->nro_cta_interbancaria = $model->setUpperCase('nro_cta_interbancaria', $model->nro_cta_interbancaria);
            $model->observaciones = $model->setUpperCase('observaciones', $model->observaciones);
            $model->estado = $model->setUpperCase('estado', $model->estado);
            $model->ubigeo_id = $model->setUpperCase('ubigeo_id', $model->ubigeo_id);
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
