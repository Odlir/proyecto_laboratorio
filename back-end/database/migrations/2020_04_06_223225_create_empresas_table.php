<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_ruc');
            $table->string('razon_social', 250);
            $table->string('pag_web')->nullable();
            $table->string('direccion');
            $table->integer('telf_fijo')->nullable();
            $table->integer('nro_celular')->nullable();
            $table->string('nombre_contacto1')->nullable();
            $table->integer('telf_fijo1')->nullable();
            $table->integer('nro_celular1')->nullable();
            $table->string('email_contacto1')->nullable();
            $table->string('nombre_contacto2')->nullable();
            $table->integer('telf_fijo2')->nullable();
            $table->integer('nro_celular2')->nullable();
            $table->string('email_contacto2')->nullable();
            $table->string('nombre_banco')->nullable();
            $table->integer('nro_cta')->nullable();
            $table->integer('nro_cta_interbancaria')->nullable();
            $table->text('observaciones')->nullable();
            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('ubigeo_id');
            $table->foreign('ubigeo_id')->references('id')->on('ubigeo');

            $table->unsignedBigInteger('insert_user_id')->comment('Usuario que hizo el registro');
            $table->foreign('insert_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('edit_user_id')->comment('Usuario que editó el registro')->nullable();
            $table->foreign('edit_user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
