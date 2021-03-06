<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_respuesta', function (Blueprint $table) {
            $table->id();

            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');

            $table->unsignedBigInteger('subpregunta_id')->nullable();
            $table->foreign('subpregunta_id')->references('id')->on('subpreguntas');

            $table->unsignedBigInteger('respuesta_id');
            $table->foreign('respuesta_id')->references('id')->on('respuestas');

            $table->unsignedBigInteger('encuesta_puntaje_id');
            $table->foreign('encuesta_puntaje_id')->references('id')->on('encuesta_puntaje');

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
        Schema::dropIfExists('encuesta_respuesta');
    }
}
