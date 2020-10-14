<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $table = 'enderecos';

    protected $fillable = [
        'ds_endereco', 'cep', 'numero', 'bairro', 'cidade', 'estado',
    ];

    public function endereco_cliente()
    {
        return $this->hasMany(EnderecoCliente::class);
    }

    public function endereco_fornecedor()
    {
        return $this->hasMany(EnderecoFornecedor::class);
    }
}
