<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    
    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 'ds_produto', 'categoria_id', 'nm_marca', 'cd_barra',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function imagem_produto()
    {
        return $this->hasMany(ImagemProduto::class);
    }

    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function preco()
    {
        return $this->hasOne(Preco::class);
    }

    public function pedido_item()
    {
        return $this->hasMany(PedidoItem::class);
    }

    public function nota_item()
    {
        return $this->hasMany(NotaItem::class);
    }
}
