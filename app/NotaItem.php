<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaItem extends Model
{
    //
    protected $table = 'nota_itens';

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
