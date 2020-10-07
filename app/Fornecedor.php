<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table = 'fornecedores';

    public function endereco_fornecedor(){
        return $this->hasMany(EnderecoFornecedor::class);
    }
}
