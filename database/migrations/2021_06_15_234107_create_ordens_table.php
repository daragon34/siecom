<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->integer('subtotal');
            $table->integer('impuesto');
            $table->integer('total');
            $table->integer('descuento')->default(0);
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
            $table->enum('estado', ['ordenado', 'enviado', 'cancelado'])->default('ordenado');
            $table->boolean('dir_diferente')->default(false);
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
