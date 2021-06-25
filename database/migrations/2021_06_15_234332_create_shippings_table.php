<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orden_id')->unsigned();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->string('celular');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('pais');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('codigo_p');
            $table->timestamps();
            $table->foreign('orden_id')->references('id')->on('ordens')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
