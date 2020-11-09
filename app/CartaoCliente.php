<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoCliente extends Model
{
    protected $table = 'cartao_clientes';

    protected $fillable = [
        'cliente_id', 'nr_cartao', 'nome', 'bandeira', 'validade',
    ];

    protected $primaryKey = 'cliente_id';

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
