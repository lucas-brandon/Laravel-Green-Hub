<?php

namespace App\Http\Controllers\Api;

use App\Cartao_cliente;
use App\Cliente;
use http\Env\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Auth;
use Illuminate\Http\Request;

class CartaoClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cartao_cliente::class;
    }

    public function salvar(Request $req)
    {
        $cliente = Cliente::find($req["cliente_id"]);

        if(is_null($cliente)){
            return response()->json("Cliente não encontrado", 404);
        }

        $dados['cliente_id'] = $cliente["id"];
        $dados['nr_cartao'] = $req["nr_cartao"];
        $dados['nome'] = $req["nome"];
        $dados['bandeira'] = $req["bandeira"];
        $dados['validade'] = $req["validade"];

        return response()->json($dados, 200);
    }
    
    public function listar(Request $req) {
        $array = array();
        $cartoes = Cartao_cliente::all();
        $clientes = Cliente::all();

        foreach ($cartoes as $cartao) {
            $dados['id_cliente'] = $cartao->id_cliente;
            $dados['nr_cartao'] = $cartao->nr_cartao;
            $dados['nome'] = $cartao->nome;
            $dados['bandeira'] = $cartao->bandeira;
            $dados['validade'] = $cartao->validade;
        }
        array_push($array, $dados);
        return response()->json($array, 201);
    }

    public function editar($id)
    {
        $cartao = Cartao_cliente::find($id);
        $cliente = Cliente::where('id_cliente', $id)->first();

        return view('cartoes.editar', compact('cartao', 'cliente'));
    }

    public function buscar($id)
    {
        $dados = Cartao_cliente::find($id);
        if (is_null($dados)) {
            return response()->json('Cartao não encontrado', 404);
        }

        return response()->json($dados, 200);
    }

    public function cartoesCliente($cliente_id)
    {
        $dados = Cartao_cliente::where('cliente_id', $cliente_id)->get();
        if (is_null($dados)) {
            return response()->json('Cliente sem cartão registrado', 404);
        }

        return response()->json($dados, 200);
    }

    public function atualizar(Request $req, $id)
    {
        $cartao['nr_cartao'] = $req['nr_cartao'];
        $cartao['bandeira'] = $req['bandeira'];
        $cartao['validade'] = $req['validade'];

        $cartaoCliente = Cartao_cliente::find($id);

        if (is_null($cartaoCliente)){
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $cartaoCliente->update($cartao);

        return response()->json($cartao, 200);
    }

    public function deletar($id)
    {
        $cartaoCliente = Cartao_cliente::find($id);
        if (is_null($cartaoCliente)) {
            return response()->json(['erro' => 'Cartão não encontrado'], 404);
        }
        $cartaoCliente->delete();
        return response()->json('Cartão Removido', 200);
    }
}
