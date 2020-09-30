<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public function Produto()
    {
        return $this->hasMany('App\Models\Categoria');
    }
}
