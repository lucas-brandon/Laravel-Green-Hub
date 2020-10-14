<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoFornecedor extends Model
{
    //
    protected $table = 'endereco_fornecedores';

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
