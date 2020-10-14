<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{

    protected $table = 'precos';

    protected $fillable = [
        'produto_id', 'valor', 'desconto', 'fl_promocao', 'dt_vigencia_ini', 'dt_vigencia_fim',
    ];

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
