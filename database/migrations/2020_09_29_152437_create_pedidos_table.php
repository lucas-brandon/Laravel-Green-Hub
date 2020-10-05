<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id');
            $table->foreignId('status_pedido_id');
            $table->foreignId('pagamento_id');
            $table->bigInteger('nr_pedido');
            $table->date('dt_pedido');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('status_pedido_id')->references('id')->on('status_pedidos');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
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
        Schema::dropIfExists('pedidos');
    }
}
