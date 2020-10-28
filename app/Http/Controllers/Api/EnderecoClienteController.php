<?php

namespace App\Http\Controllers\Api;

use App\EnderecoCliente;
use App\Cliente;
use App\Endereco;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnderecoClienteController extends BaseController
{

    public function __construct()
    {
        $this->classe = EnderecoCliente::class;
    }

    public function cadastrar(Request $req)
    {
        $dados = $req->all();
        $dados['id_cliente'] = Cliente::user('id_cliente');
        $dados['id_endereco'] = Endereco::user('id_endereco');

        return response()->json(EnderecoCliente::create($dados), 201);
    }

    public function deletar($id)
    {
        
        $dado = EnderecoCliente::where('cliente_id', $id)->first();

        if (is_null($dado)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $dado->delete();

        return response()->json('Item Removido', 200);
    }

    
}
