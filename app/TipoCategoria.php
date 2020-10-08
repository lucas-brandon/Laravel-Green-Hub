<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{
    //
    public function categoria(){
        return $this->hasMany(Categoria::class);
    }
}
