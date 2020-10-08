<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //
    protected $table = 'contatos';

    protected $fillable = [
        'cliente_id', 'ds_contato', 'tipo_contato_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipo_contatos()
    {
        return $this->belongsTo(Tipo_Contato::class);
    }
}
