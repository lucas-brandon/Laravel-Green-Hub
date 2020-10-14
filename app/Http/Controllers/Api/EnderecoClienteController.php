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

    public function salvar(Request $req)
    {
        $dados = $req->all();
        $dados['id_cliente'] = Cliente::user('id_cliente');
        $dados['id_endereco'] = Endereco::user('id_endereco');

        return response()->json(EnderecoCliente::create($dados), 201);
    }

    public function listar($id)
    {
        $enderecoCliente = [];
        $cliente = Cliente::find($id);
        $enderecos = EnderecoCliente::all();
        foreach($enderecos as $endereco) {
            if($endereco['id_cliente'] == $cliente){
                array_push($enderecoCliente, $endereco);
            }
        }
        return response()->json($enderecoCliente, 201);
    }

    public function buscar($idEnd)
    {
        if ($endereco = EnderecoCliente::find($idEnd)){
            return response()->json($endereco, 200);;
        } else {
            return response()->json('Endereço não encontrado', 404);
        }
    }
}
