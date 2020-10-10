<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';

    protected $fillable = [
        'ds_categoria',
    ];
    
    public function tipo_categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function produtos(){
        return $this->hasMany(Produto::class);
    }


}
