<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    //
    protected $table = 'tipo_contatos';

    protected $fillable = [
        'descricao',
    ];

    public function contato(){
        return $this->hasMany(Contato::class);
    }
}
