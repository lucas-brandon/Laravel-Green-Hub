<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index(Request $req)
    {
        $clientes = Cliente::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.clientes.index', compact('clientes', 'mensagem'));
    }


    public function adicionar()
    {
        return view('admin.clientes.adicionar');
        
    }

    public function salvar(Request $req)
    {
        //echo 'salvando no banco';
        //'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',
        
        $cliente = $req->all();
        //Se a imagem foi subida pelo usuário

        Cliente::create($cliente);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Cliente cadastrado com sucesso');

        return redirect()->route('admin.clientes.home');
    }
    
    public function editar($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.editar', compact('cliente'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $cliente = $req->all();

        Cliente::find($id)->update($cliente);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Cliente editado com sucesso');

        return redirect()->route('admin.clientes.home');
    }

    public function deletar(Request $req, $id)
    {
        $cliente = Cliente::find($id);
        

        Cliente::find($id)->delete();

        $req->session()->flash('mensagem', 'Cliente deletado com sucesso');

        return redirect()->route('admin.clientes.home');
    }

}
