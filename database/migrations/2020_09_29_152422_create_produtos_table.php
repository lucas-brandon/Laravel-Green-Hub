<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->nullable();
            $table->string('nome_produto');
            $table->string('ds_produto');
            $table->double('peso', 8, 2)->nullable();
            $table->string('nm_marca');
            $table->string('cd_barra');
            //$table->string('subcategoria');
            $table->double('largura', 8, 2)->nullable();
            $table->date('altura', 8 , 2)->nullable();
            $table->date('comprimento', 8, 2)->nullable();
            $table->boolean('status_produto');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
