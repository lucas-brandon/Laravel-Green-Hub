<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Produto extends Model
{
    //
    protected $table = 'imagem_produtos';

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
