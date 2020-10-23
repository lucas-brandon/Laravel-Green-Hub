<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    /*
    $table->foreignId('cliente_id');
    $table->foreignId('endereco_id');
    */
    protected $table = 'endereco_clientes';

    protected $fillable = [
        'cliente_id', 'endereco_id',
    ];



    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
