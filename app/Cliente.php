<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function cartao_cliente()
    {
        return $this->hasMany('App\Model\Cartao_Cliente');
    }
}
