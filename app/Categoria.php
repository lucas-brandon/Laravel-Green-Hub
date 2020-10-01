<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    public function tipo_categorias(){
        return $this->belongsTo('App\Model\Tipo_Categoria');
    }

    public function produtos(){
        return $this->hasMany('App\Model\Produto');
    }


}
