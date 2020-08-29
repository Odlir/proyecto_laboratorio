<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->char('tipo_documento', 1)->comment('1-Dni/2-Pasaporte')->default(1);
            $table->integer('nro_documento');
            $table->string('nombres');
            $table->string('apellido_materno')->nullable();
            $table->string('apellido_paterno');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->char('sexo', 1)->comment('1-Femenino/2-Masculino')->default(1);
            $table->integer('nro_celular')->nullable();
            $table->string('email')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->string('direccion');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('departamento');
            $table->string('provincia');
            $table->text('referencias')->nullable();
            $table->char('tipo_paciente', 1)->comment('1-Nuevo/2-Antiguo')->default(1);
            $table->text('observaciones1')->nullable();
            $table->text('observaciones2')->nullable();
            $table->char('estado', 1)->comment('0-Desactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');

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
        Schema::dropIfExists('personas');
    }
}
