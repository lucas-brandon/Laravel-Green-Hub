<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Contato::class;
    }

    public function buscarEmail($contato)
    {
        $email = Contato::where('ds_contato', $contato)->first();
        if(is_null($email))
        {
            return response()->json('Email não encontrado', 404);
        }

        return response()->json($email, 200);
    }
}
