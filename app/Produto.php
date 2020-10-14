<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
<<<<<<< HEAD
    //public function categoria()
    //{
    //    return $this->hasOne('App\Models\Categoria', 'categoria_id');
    //}
=======
    
    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 'ds_produto', 'categoria_id', 'nm_marca', 'cd_barra',
    ];
>>>>>>> 04e873087fa924732f0c6d80bd39f97366277203

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
<<<<<<< HEAD
=======
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
>>>>>>> 04e873087fa924732f0c6d80bd39f97366277203
    }
}