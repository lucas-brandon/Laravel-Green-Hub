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

    /*
    $table->foreignId('cliente_id');
    $table->integer('nr_cartao');
    $table->string('nome');
    $table->string('bandeira');
    $table->date('validade'); 
    */

    public function cadastrar(Request $req, $id)
    {
        //$dados = $req->all();
        $cliente = Cliente::find($id);

        if(is_null($cliente)){
            return response()->json("Cliente não encontrado", 404);
        }

        $dados['cliente_id'] = $cliente['id'];
        $dados['nr_cartao'] = $req->nr_cartao;
        $dados['nome'] = $req->nome;
        $dados['bandeira'] = $req->bandeira;
        $dados['validade'] = $req->validade;

        return response()->json(CartaoCliente::create($dados), 201);
    }
}
