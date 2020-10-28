<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedidos';

    /*
        $table->foreignId('cliente_id')->nullable();
            $table->foreignId('status_pedido_id')->nullable();
            $table->foreignId('pagamento_id')->nullable();
            $table->bigInteger('nr_pedido');
            $table->date('dt_pedido');
            $table->float('valor');
    */
    protected $fillable = [
        'cliente_id', 'status_pedido_id', 'pagamento_id', 'nr_pedido', 'dt_pedido', 'valor',
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
