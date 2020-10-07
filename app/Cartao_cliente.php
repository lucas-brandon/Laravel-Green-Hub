<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao_cliente extends Model
{
    //
    protected $table = 'cartao_clientes';

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
