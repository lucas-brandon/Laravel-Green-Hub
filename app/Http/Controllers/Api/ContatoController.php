<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use App\Contato;
use http\Env\Response;


use App\Http\Controllers\Controller;
use App\TipoContato;
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
    
    public function listar(Request $req)
    {
        $contatos = Contato::all();

        foreach($contatos as $contato)
        {
            $tipo = TipoContato::where('id', $contato['tipo_contato_id'])->first();
            $contato['tipo'] = $tipo['descricao'];
        }

        return response()->json($contatos, 201);
    }

    public function listarContatos($cliente_id)
    {
        $array = array();
        $contatos = Contato::where('cliente_id', $cliente_id)->get();
        foreach($contatos as $contato)
        {
            $tipo = TipoContato::where('id', $contato['tipo_contato_id'])->first();
            $contato['tipo'] = $tipo['descricao'];
            array_push($array, $contato);
        }
        return response()->json($array, 201);

    }
}
