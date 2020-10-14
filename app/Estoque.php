<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoques';

    protected $fillable = [
        'produto_id', 'qtd_item',
    ];

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
