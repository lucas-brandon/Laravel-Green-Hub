<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoques';

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
