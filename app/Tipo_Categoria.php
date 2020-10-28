<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Categoria extends Model
{
    //
    public function categorias(){
        return $this->hasOne('App\Model\Categoria');
    }
}
