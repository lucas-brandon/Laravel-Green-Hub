<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //
    protected $table = 'contatos';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipo_contato()
    {
        return $this->belongsTo(TipoContato::class);
    }
}
