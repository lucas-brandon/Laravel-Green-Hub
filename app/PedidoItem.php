<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    //
    /*
    $table->foreignId('pedido_id');
    $table->foreignId('produto_id');
    $table->string('valor_unitario');
    $table->foreignId('qtd_item');
    */

    protected $table = 'pedido_itens';

    protected $fillable = [
        'pedido_id', 'produto_id', 'valor_unitario', 'qtd_item',
    ];    



    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
