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

    public function salvar(Request $req)
    {
        $cliente = Cliente::find($req['cliente_id']);

        if(is_null($cliente))
        {
            return response()->json('Cliente não encontrado', 404);
        }

        $contato['cliente_id'] = $req['cliente_id'];
        $tipo_contato1 = TipoContato::where('descricao', $req['tipo'])->first();

        $contato['ds_contato'] = $req['ds_contato'];
        $contato['tipo_contato_id'] = $tipo_contato1['id'];

        Contato::create($contato);
        $contato['tipo'] = $req['tipo'];

        return response()->json($contato, 201);

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
