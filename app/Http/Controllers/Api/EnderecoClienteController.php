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
        $dados = "";
        if (!is_null(Cliente::where('id', $req["id_cliente"]))){
            $dados['id_cliente'] = Cliente::where('id', $req["id_cliente"]);
        } else if (!is_null(Endereco::where('id', $req["id_endereco"]))){
            $dados['id_endereco'] = Endereco::where('id', $req["id_endereco"]);
        }
        // $dados['id_cliente'] = Cliente::where('id', $req["id_cliente"]);
        // $dados['id_endereco'] = Endereco::where('id', $req["id_endereco"]);

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

    
    public function listar($idCliente)
    {
        $enderecoCliente = [];
        $cliente = Cliente::find($idCliente);
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
            return response()->json($endereco, 200);
        } else {
            return response()->json('Endereço não encontrado', 404);
        }
    }

    public function enderecosCliente($cliente_id)
    {
        $dados = EnderecoCliente::where('cliente_id', $cliente_id)->get();
        if (is_null($dados)) {
            return response()->json('Cliente sem endereço registrado', 404);
        }

        return response()->json($dados, 200);
    }
}
