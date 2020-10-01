<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    public function Produto()
    {
        return $this->hasOne('App\Models\Produto');
    }
}
