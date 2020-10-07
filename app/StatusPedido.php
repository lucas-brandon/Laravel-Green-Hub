<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    //
    protected $table = 'status_pedidos';

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}
