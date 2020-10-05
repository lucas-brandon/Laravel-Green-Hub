<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //no fillable tem que ser o mesmo nome de coluna e variavel pra dar match
    protected $fillable = [
        'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra',
    ];

    public function categorias()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
}
