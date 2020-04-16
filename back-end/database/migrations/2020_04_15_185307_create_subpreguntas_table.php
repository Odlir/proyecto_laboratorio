<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubpreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpreguntas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->char('estado',1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('tipo_encuesta_id');
            $table->foreign('tipo_encuesta_id')->references('id')->on('tipo_encuesta');

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
        Schema::dropIfExists('subpreguntas');
    }
}
