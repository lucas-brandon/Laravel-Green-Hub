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
        $dados = [];
        $cliente = Cliente::where('id', $req["cliente_id"])->first();
        $endereco = Endereco::where('id', $req["endereco_id"])->first();
        if (is_null($cliente)){
            return response()->json("Cliente não encontrado!", 404);
        } else if (is_null($endereco)){
            return response()->json("Endereco não encontrado!", 404);
        }
        $dados['cliente_id'] = $cliente["id"];
        $dados['endereco_id'] = $endereco["id"];

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

    public function listarEnderecos($cliente_id){

        $array = array(); 
        $enderecos = EnderecoCliente::where('cliente_id', $cliente_id)->get();

        foreach($enderecos as $endereco){
            $dado = Endereco::find($endereco['endereco_id']);
            array_push($array, $dado);
        }

        return response()->json($array, 201);
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
        $enderecos = [];
        foreach ($dados as $dado) {
            $endereco = Endereco::find($dado["endereco_id"])->first();
            array_push($enderecos, $endereco);
        }
        return response()->json($enderecos, 200);
    }
}
