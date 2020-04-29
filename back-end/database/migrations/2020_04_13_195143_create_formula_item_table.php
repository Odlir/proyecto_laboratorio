<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_item', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->char('posicion', 1)->comment('0-Abajo/1-Arriba');
            $table->char('estado', 1)->comment('0-Inactivo/1-Activo')->default(1);
            $table->unsignedBigInteger('formula_id');
            $table->foreign('formula_id')->references('id')->on('formulas');
            $table->unsignedBigInteger('area_item_id');
            $table->foreign('area_item_id')->references('id')->on('area_item');
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
        Schema::dropIfExists('formula_item');
    }
}
