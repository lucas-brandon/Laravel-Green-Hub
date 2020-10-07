<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Categoria extends Model
{
    //
    public function categoria(){
        return $this->hasMany(Categoria::class);
    }
}
