<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
