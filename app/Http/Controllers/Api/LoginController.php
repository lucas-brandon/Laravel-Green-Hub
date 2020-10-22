<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use App\Login;
use http\Env\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function __construct()
    {
        $this->classe = Login::class;
    }

    public function Cadastrar(Request $req) 
    {
        $dados = $req->all();
        $dados['id_cliente'] = Cliente::user()->id_cliente;
        $dados['email'] = $req->nr_cartao;
        $dados['senha'] = Cliente::user()->nome;

        return response()->json(Login::create($dados), 201);
    }

    public function LogIn ($mail, $password)
    {
        $emails = [Login::column('email')];
        $senhas = [Login::column('senha')];
        foreach ($emails as $email) {
            foreach ($senhas as $senha) {
                if ($mail == $email && $password == $senha) {
                    return response()->json($mail, 200);
                } else {
                    return response()->json('Cliente não encontrado', 404);
                }
            }
        }
    }
}