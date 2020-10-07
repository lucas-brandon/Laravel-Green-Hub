<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $table = 'enderecos';

    public function endereco_cliente()
    {
        return $this->hasMany(Endereco_cliente::class);
    }

    public function endereco_fornecedor()
    {
        return $this->hasMany(Endereco_fornecedor::class);
    }
}
