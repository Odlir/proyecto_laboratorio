<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaPuntajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_puntaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('encuesta_puntaje_id');
            $table->foreign('encuesta_puntaje_id')->references('id')->on('encuesta_puntaje');

            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');

            $table->string('palabra');

            $table->double('puntaje');
            $table->char('letra',1);
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
        Schema::dropIfExists('area_puntaje');
    }
}
