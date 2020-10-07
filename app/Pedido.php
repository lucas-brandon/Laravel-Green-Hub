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

    protected $table = 'pedidos';

    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nr_pedido', 'dt_pedido',
    ];

    public function pagamento(){
        return $this->belongsTo(Pagamento::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function status_pedido(){
        return $this->belongsTo(StatusPedido::class);
    }

    public function nota(){
        return $this->hasOne(Nota::class);
    }

    public function pedido_item(){
        return $this->hasMany(PedidoItem::class);
    }

}
