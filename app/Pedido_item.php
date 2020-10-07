<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_item extends Model
{
    //
    protected $table = 'pedido_itens';

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
