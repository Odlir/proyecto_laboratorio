<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('empresa_sucursal_id');
            $table->foreign('empresa_sucursal_id')->references('id')->on('empresa_sucursal');

            $table->unsignedBigInteger('tipo_encuesta_id');
            $table->foreign('tipo_encuesta_id')->references('id')->on('tipo_encuesta');

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
        Schema::dropIfExists('encuestas');
    }
}
