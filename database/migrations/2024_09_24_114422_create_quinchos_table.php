<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuinchosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quinchos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_quincho');
            $table->string('descripcion');
            $table->enum('accesibilidad', ['Sí', 'No']);
            $table->unsignedBigInteger('id_tipo_quincho');
            $table->foreign('id_tipo_quincho')->references('id')->on('tipo_quincho');
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
        Schema::dropIfExists('quinchos');
    }
}
