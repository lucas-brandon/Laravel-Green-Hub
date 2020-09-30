<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Contato extends Model
{
    //
    public function contato(){
        return $this->hasOne('App\Models\Contato');
    }
}
