<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Produto extends Model
{
    //
    public function produto(){
        return $this->belongsTo('App\Model\Produto');
    }
}
