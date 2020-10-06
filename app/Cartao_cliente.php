<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao_cliente extends Model
{
    //
    public function cliente(){
        return $this->belongsTo('App\Model\Cliente');
    }

}
