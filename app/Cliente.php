<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    

    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha', 'status_cliente'
    ];

    public function cartao_cliente()
    {
        return $this->hasMany(CartaoCliente::class);
    }

    public function endereco_cliente()
    {
        return $this->hasMany(EnderecoCliente::class);
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
