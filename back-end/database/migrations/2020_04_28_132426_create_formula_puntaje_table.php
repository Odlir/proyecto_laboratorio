<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulaPuntajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_puntaje', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('encuesta_puntaje_id');
            $table->foreign('encuesta_puntaje_id')->references('id')->on('encuesta_puntaje');

            $table->unsignedBigInteger('formula_id');
            $table->foreign('formula_id')->references('id')->on('formulas');

            $table->double('puntaje');
            $table->double('transformacion');
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
        Schema::dropIfExists('formula_puntaje');
    }
}
