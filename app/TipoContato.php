<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    //
    public function contato(){
        return $this->hasMany(Contato::class);
    }
}
