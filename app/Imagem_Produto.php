<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Produto extends Model
{
    //
    public function produtos(){
        return $this->belongsTo('App\Models\Produto');
    }
}
