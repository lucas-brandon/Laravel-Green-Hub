<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    //
    public function index(Request $req)
    {
        $pedidos = Pedido::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.pedidos.index', compact('pedidos', 'mensagem'));
    }


    public function adicionar()
    {
        return view('admin.pedidos.adicionar');
        
    }

    public function salvar(Request $req)
    {
        //'nome_pedido', 'ds_pedido', 'nm_marca', 'cd_barra',
        
        $pedido = $req->all();
        //dd($pedido);

        Pedido::create($pedido);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Pedido cadastrado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }
    
    public function editar($id)
    {
        $pedido = Pedido::find($id);
        return view('admin.pedidos.editar', compact('pedido'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $pedido = $req->all();

        Pedido::find($id)->update($pedido);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Pedido editado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }

    public function deletar(Request $req, $id)
    {
        $pedido = Pedido::find($id);
        

        Pedido::find($id)->delete();

        $req->session()->flash('mensagem', 'Pedido deletado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }
}
