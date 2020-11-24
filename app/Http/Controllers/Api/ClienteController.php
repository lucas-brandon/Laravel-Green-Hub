<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use App\Contato;
use App\TipoContato;
use http\Env\Response;
//use App\Http\Controllers\Mail;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\GreenHub;
use stdClass;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends BaseController
{
    

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

        $cliente['status_cliente'] = true;

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

        $user = new stdClass();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->msg = $req['msg'];
        $user->subject = $req['assunto'];

        Mail::send(new GreenHub($user));
        //return new GreenHub($user);
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
        try{
            //echo 'salvando no banco';
            $cliente = $req->all();

            Cliente::find($id)->update($cliente);

            //Cria uma variavel mensagem na sessão atual
            $req->session()->flash('mensagem', 'Cliente editado com sucesso');

            //return redirect()->route('admin.clientes.index');

            $c = Cliente::where('id', $id)->get();

            //dd($cliente);


            $user = new stdClass();
            $user->name = $c['nome'];

            $tipo_contato1 = TipoContato::where('descricao', 'email')->first();

            $contato1 = Contato::where('cliente_id', $id)->where('tipo_contato_id', $tipo_contato1['id'])->first();
            
            $user->email = $contato1['ds_contato'];
            $user->msg = "Sua senha foi alterada com sucesso";
            $user->subject = "Green Hub Suplementos - Aviso de alteração de senha";

            //return response()->json($user);
            //error_log($user);
            return "aaaaaaaaaaaa";
            Mail::send(new GreenHub($user));

            return response()->json($cliente, 200);

        }
        catch(\Exception $e){
            return response()->json($e);
        } 
        
    }

    public function logar($senha, $email)
    {
        try{
            $clienteSenha = Cliente::where('senha', $senha)->get();
            $clienteEmail = Contato::where('ds_contato', $email)->first();
            if ($clienteSenha == '' || $clienteEmail == ''){
                return response()->json('Cliente não encontrado', 404);
            }
            foreach ($clienteSenha as $cliente) {
                if ($clienteEmail->cliente_id == $cliente->id) {
                    $cliente['email'] = $clienteEmail['ds_contato'];
                    return response()->json($cliente, 200);
                } 
            }
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        } 
    }
    
    public function verificaCliente($cpf, $email)
    {
        try{
            $clienteCPF = Cliente::where('cpf', $cpf)->get();
            $clienteEmail = Contato::where('ds_contato', $email)->first();
            if ($clienteCPF == '' || $clienteEmail == ''){
                return 0;
            }
            foreach ($clienteCPF as $cliente) {
                if ($clienteEmail->cliente_id == $cliente->id) {
                    //$cliente['email'] = $clienteEmail['ds_contato'];
                    //return response()->json($cliente, 200);
                    return $cliente->id;
                } 
            }
            return 0;
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        } 
    } 

}
