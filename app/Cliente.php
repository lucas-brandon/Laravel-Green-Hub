<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    

    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',
    ];

    public function cartao_cliente()
    {
        return $this->hasMany(Cartao_cliente::class);
    }

    public function endereco_cliente()
    {
        return $this->hasMany(Endereco_cliente::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }

    public function contato()
    {
        return $this->hasMany(Contato::class);
    }
}
