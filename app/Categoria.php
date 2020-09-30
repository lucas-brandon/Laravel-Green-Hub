<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    public function tipo_categorias(){
        return $this->hasOne('App\Models\Tipo_Categoria');
    }

    public function produtos(){
        return $this->belongsTo('App\Models\Produto');
    }


}
