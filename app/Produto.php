<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //public function categoria()
    //{
    //    return $this->hasOne('App\Models\Categoria', 'categoria_id');
    //}

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}