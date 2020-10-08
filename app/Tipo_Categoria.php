<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Categoria extends Model
{
    //
    protected $table = 'tipo_categorias';

    public function categoria(){
        return $this->hasMany(Categoria::class);
    }
}
