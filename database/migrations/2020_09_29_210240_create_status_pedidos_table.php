<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pedidos', function (Blueprint $table) {
            $table->bigIncrements('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->string('ds_status_pedido');
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
        Schema::dropIfExists('status_pedidos');
    }
}
