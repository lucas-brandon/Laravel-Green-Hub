<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Contato extends Model
{
    //
    protected $table = 'tipo_contatos';

    public function contato(){
        return $this->hasMany(Contato::class);
    }
}
