<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco_cliente extends Model
{
    //
    protected $table = 'endereco_clientes';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
