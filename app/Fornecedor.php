<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome', 'cnpj', 'telefone', 'email',
    ];

    public function endereco_fornecedor(){
        return $this->hasMany(EnderecoFornecedor::class);
    }
}
