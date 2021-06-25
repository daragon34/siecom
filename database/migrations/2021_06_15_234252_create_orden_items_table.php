<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('orden_id')->unsigned();
            $table->integer('precio');
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos')->ondelete('cascade');
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
        Schema::dropIfExists('orden_items');
    }
}
