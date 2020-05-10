<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipo_encuesta_id');
            $table->foreign('tipo_encuesta_id')->references('id')->on('tipo_encuesta');

            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('carrera_id')->references('id')->on('carreras');

            $table->unsignedBigInteger('formula_item_id')->nullable();
            $table->foreign('formula_item_id')->references('id')->on('formula_item');

            $table->string('nombre');
            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->char('inversa', 1)->comment('0-No/1-Si')->nullable();

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
        Schema::dropIfExists('preguntas');
    }
}
