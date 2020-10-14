<?php

namespace App\Http\Controllers\Api;

use App\CartaoCliente;
use App\Cliente;
use http\Env\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class CartaoClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = CartaoCliente::class;
    }

    public function cadastrar(Request $req)
    {
        //$dados = $req->all();
        $dados['id_cliente'] = Cliente::user('id_cliente');
        $dados['nr_cartao'] = $req->nr_cartao;
        $dados['nome'] = Cliente::user('nome');
        $dados['bandeira'] = $req->bandeira;
        $dados['validade'] = $req->validade;

        return response()->json(CartaoCliente::create($dados), 201);
    }
}
