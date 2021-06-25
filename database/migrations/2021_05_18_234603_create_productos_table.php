<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique;
            $table->string('descripcion_corta')->nullable();
            $table->text('descripcion');
            $table->integer('precio_regular')->nullable();
            $table->integer('precio_compra');
            $table->enum('disponibilidad', ['disponible', 'agotado']);
            $table->boolean('destacar')->default(false);
            $table->string('sku');
            $table->unsignedInteger('cantidad')->default(1);
            $table->string('imagen')->nullable();
            $table->text('imagenes')->nullable();
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
