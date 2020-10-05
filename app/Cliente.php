<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',
    ];

    public function cartao_cliente()
    {
        return $this->hasMany('App\Model\Cartao_Cliente');
    }
}
