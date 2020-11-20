<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao_clientes', function (Blueprint $table) {
            $table->foreignId('cliente_id');
            $table->string('nr_cartao');
            $table->string('nome');
            $table->string('bandeira');
            $table->string('mes_validade');
            $table->string('ano_validade'); 
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartao_clientes');
    }
}
