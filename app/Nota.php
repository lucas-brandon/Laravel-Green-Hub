<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $table = 'notas';

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function nota_item()
    {
        return $this->hasMany(Nota_item::class);
    }
}
