<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    public function endereco_fornecedores(){
        return $this->hasMany('App\Model\Endereco_Fornecedor');
    }
}
