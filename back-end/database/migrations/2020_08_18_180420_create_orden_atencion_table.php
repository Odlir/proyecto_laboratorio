<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_atencion', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_atencion');
            $table->date('fecha_atencion');
            $table->time('hora_atencion');
            $table->string('paciente');
            $table->string('analisis');

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
        Schema::dropIfExists('orden_atencion');
    }
}
