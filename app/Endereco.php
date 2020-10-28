<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    /*
            $table->string('ds_endereco');
            $table->string('cep');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');


    */
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
