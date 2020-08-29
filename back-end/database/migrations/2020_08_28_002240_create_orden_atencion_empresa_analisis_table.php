<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenAtencionEmpresaAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_atencion_empresa_analisis', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro');
            $table->char('estado', 1)->comment('0-Desactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('personas');

            $table->unsignedBigInteger('oa_empresa_id');
            $table->foreign('oa_empresa_id')->references('id')->on('orden_atencion_empresa');

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
        Schema::dropIfExists('orden_atencion_analisis');
    }
}
