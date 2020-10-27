<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    //
    protected $table = 'imagem_produtos';

    protected $fillable = [
        'produto_id', 'link_imagem', 'descricao'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
