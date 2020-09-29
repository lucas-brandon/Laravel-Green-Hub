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
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('ds_produto');
            $table->double('peso', 8, 2);
            $table->string('nm_marca');
            $table->string('cd_barra');
            $table->string('subcategoria');
            $table->double('largura', 8, 2);
            $table->date('altura', 8 , 2);
            $table->date('comprimento', 8, 2);
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
        Schema::dropIfExists('produtos');
    }
}
