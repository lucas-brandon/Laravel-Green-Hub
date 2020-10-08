<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_fornecedores', function (Blueprint $table) {
            $table->foreignId('fornecedor_id');
            $table->foreignId('endereco_id');
            $table->timestamps();

            $table->primary('fornecedor_id', 'endereco_id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco_fornecedores');
    }
}
