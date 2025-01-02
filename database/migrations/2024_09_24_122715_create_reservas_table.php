<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_arriendo');
            $table->string('nombre', 200);
            $table->string('rut');
            $table->string('direccion');
            $table->string('correo');
            $table->bigInteger('telefono');
            $table->enum('opcion', ['Unifamiliar', 'Multifamiliar']);
            $table->string('numero_quincho');
            $table->integer('numero_personas');
            $table->time('hora_arriendo');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_quincho');
            $table->foreign('id_estado')->references('id')->on('estado_quinchos');
            $table->foreign('id_quincho')->references('id')->on('quinchos');
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
        Schema::dropIfExists('reservas');
    }
}
