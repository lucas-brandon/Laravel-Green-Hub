<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_clientes', function (Blueprint $table) {
            $table->bigIncrements('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->bigIncrements('endereco_id');
            $table->foreign('endereco_id')->references('id')->on('endereco');
            
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
        Schema::dropIfExists('endereco_clientes');
    }
}
