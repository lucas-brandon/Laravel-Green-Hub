<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_item extends Model
{
    public function pedidos()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produtos()
    {
        return $this->belongsTo(Produto::class);
    }
}
