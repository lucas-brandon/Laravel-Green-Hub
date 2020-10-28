<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoCliente extends Model
{
    /*
    $table->foreignId('cliente_id');
    $table->integer('nr_cartao');
    $table->string('nome');
    $table->string('bandeira');
    $table->date('validade'); 
    */
    protected $table = 'cartao_clientes';

    protected $fillable = [
        'cliente_id', 'nr_cartao', 'nome', 'bandeira', 'validade',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
