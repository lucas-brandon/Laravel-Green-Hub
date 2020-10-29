<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    protected $table = 'logins';

    protected $fillable = [
        'id_cliente', "email", "senha",
    ];

    public function id_cliente(){
        return $this->id_cliente->belongsTo(Cliente::class);
    }

    public function senha(){
        return $this->senha->belongsTo(Cliente::class);
    }
}
