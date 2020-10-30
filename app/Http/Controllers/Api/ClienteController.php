<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use App\Contato;
use App\TipoContato;
use http\Env\Response;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cliente::class;
    }

    public function salvar(Request $req)
    {
        //echo 'salvando no banco';
        //'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',
        
        //$cliente = $req->all();
        try{
        $cliente['nome'] = $req['nome'];
        $cliente['sobrenome'] = $req['sobrenome'];
        $cliente['cpf'] = $req['cpf'];
        $cliente['dt_nascimento'] = $req['dt_nascimento'];
        $cliente['senha'] = $req['senha'];

        $tipo_contato1 = TipoContato::where('descricao', 'email')->first();

        $contato1['ds_contato'] = $req['email'];
        $contato1['tipo_contato_id'] = $tipo_contato1['id'];

        $tipo_contato2 = TipoContato::where('descricao', 'telefone')->first();

        $contato2['ds_contato'] = $req['telefone'];
        $contato2['tipo_contato_id'] = $tipo_contato2['id'];

        $clienteBanco = Cliente::create($cliente);
        $contato1['cliente_id'] = $clienteBanco['id'];
        $contato2['cliente_id'] = $clienteBanco['id'];

        Contato::create($contato1);
        Contato::create($contato2);

        //Cria uma variavel mensagem na sessão atual
        //$req->session()->flash('mensagem', 'Cliente cadastrado com sucesso');

        //return redirect()->route('admin.clientes.index');
        return response()->json($cliente, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function buscarNome($nome)
    {
        $cliente = Cliente::where('nome', $nome)->first();

        if(is_null($cliente))
        {
            return response()->json('Cliente não encontrado', 404);
        }

        return response()->json($cliente, 200);

    }
    
    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $cliente = $req->all();

        Cliente::find($id)->update($cliente);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Cliente editado com sucesso');

        //return redirect()->route('admin.clientes.index');

        return response()->json($cliente, 200);
    }

    public function buscarSenha($senha)
    {
        $cliente = Cliente::where('senha', $senha);
        if(is_null($cliente))
        {
            return response()->json('Cliente não encontrado', 404);
        }

        return response()->json($cliente, 200);
    }

    public function logar($senha, $email)
    {
        $clienteSenha = Cliente::where('senha', $senha)->get();
        $clienteEmail = Contato::where('ds_contato', $email)->first();
        foreach ($clienteSenha as $cliente) {
            if ($clienteSenha == '' || $clienteEmail == ''){
                return response()->json('Cliente não encontrado', 404);
            }
            else if ($clienteEmail->cliente_id == $cliente->id) {
                return response()->json($cliente, 200);
            } 
        } 
    } 

}
