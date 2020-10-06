<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    //
    public function pedido(){
        return $this->hasOne('App\Model\Pedido');
    }
}
