<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /*
    $table->id();
    $table->foreignId('cliente_id');
    $table->foreignId('status_pedido_id');
    $table->foreignId('pagamento_id');
    $table->bigInteger('nr_pedido');
    $table->date('dt_pedido');
    */

    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nr_pedido', 'dt_pedido',
    ];

}
