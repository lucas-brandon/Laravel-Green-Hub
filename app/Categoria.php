<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    public function tipo_categorias(){
        return $this->belongsTo('App\Models\Tipo_Categoria');
    }

    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }


}
