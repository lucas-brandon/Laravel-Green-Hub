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
            $table->bigIncrements('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->increments('cartao');
            $table->string('nome');
            $table->string('bandeira');
            $table->date('validade'); 
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
        Schema::dropIfExists('cartao_clientes');
    }
}
