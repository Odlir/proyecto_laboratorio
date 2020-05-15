<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentoRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talento_respuesta', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('encuesta_puntaje_id');
            $table->foreign('encuesta_puntaje_id')->references('id')->on('encuesta_puntaje');

            $table->unsignedBigInteger('talento_id');
            $table->foreign('talento_id')->references('id')->on('talentos');

            $table->char('tipo', 1)->comment('0-MenosDesarrollado/1-Intermedio/2-MasDesarrollado');

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
        Schema::dropIfExists('talento_respuesta');
    }
}
