<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDetalleEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_detalle_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('empleados');
            $table->char('estado', 1)->comment('0-Desactivo/1-Activo')->default(1);

            $table->unsignedBigInteger('orden_empleado_id');
            $table->foreign('orden_empleado_id')->references('id')->on('orden_atencion_empresa_empleado');

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
        Schema::dropIfExists('orden_detalle_empresa');
    }
}
