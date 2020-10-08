<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Contato;
use App\Http\Controllers\Controller;
use App\TipoContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    //
    public function index(Request $req)
    {
        $clientes = Cliente::all();
        $contatos = Contato::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.clientes.index', compact('clientes', 'contatos', 'mensagem'));
    }


    public function adicionar()
    {
        return view('admin.clientes.adicionar');
        
    }

    public function salvar(Request $req)
    {
        //echo 'salvando no banco';
        //'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',
        
        //$cliente = $req->all();
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
        $req->session()->flash('mensagem', 'Cliente cadastrado com sucesso');

        return redirect()->route('admin.clientes.index');
    }
    
    public function editar($id)
    {
        $cliente = Cliente::find($id);
        $contatos = Contato::where('cliente_id', $id)->get();
        $tipo_contatos = TipoContato::all();
        return view('admin.clientes.editar', compact('cliente', 'contatos', 'tipo_contatos'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $cliente = $req->all();

        Cliente::find($id)->update($cliente);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Cliente editado com sucesso');

        return redirect()->route('admin.clientes.index');
    }

    public function deletar(Request $req, $id)
    {
        $cliente = Cliente::find($id);
        

        Cliente::find($id)->delete();

        $req->session()->flash('mensagem', 'Cliente deletado com sucesso');

        return redirect()->route('admin.clientes.index');
    }

}
