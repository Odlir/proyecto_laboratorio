<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tendencia_id')->nullable();
            $table->foreign('tendencia_id')->references('id')->on('tendencia_talento');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_talento');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('imagen_espalda');
            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);
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
        Schema::dropIfExists('talentos');
    }
}
