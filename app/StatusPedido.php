<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    //
    protected $table = 'status_pedidos';

    //ds_status
    protected $fillable = [
        'ds_status',
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}
