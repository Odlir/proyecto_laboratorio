<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_persona', function (Blueprint $table) {
            $table->id();

            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');

            $table->unsignedBigInteger('encuesta_general_id');
            $table->foreign('encuesta_general_id')->references('id')->on('encuesta_general');

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
        Schema::dropIfExists('encuesta_persona');
    }
}
