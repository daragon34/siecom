<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('orden_id')->unsigned();
            $table->enum('m_pago',['codigo', 'tarjeta', 'paypal']);
            $table->enum('estad_pago',['pendiente', 'aprobado', 'declinado', 'cancelado'])->default('pendiente');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->ondelete('cascade');
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
        Schema::dropIfExists('transaccions');
    }
}
