<?php

namespace App\Http\Controllers\Admin;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //
    public function index(Request $req)
    {
        $produtos = Produto::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.produtos.index', compact('produtos', 'mensagem'));
    }


    public function adicionar()
    {
        return view('admin.produtos.adicionar');
        
    }

    public function salvar(Request $req)
    {
        //'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra',
        
        $produto = $req->all();
        //dd($produto);

        Produto::create($produto);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto cadastrado com sucesso');

        return redirect()->route('admin.produtos.home');
    }
    
    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('admin.produtos.editar', compact('produto'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $produto = $req->all();

        Produto::find($id)->update($produto);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto editado com sucesso');

        return redirect()->route('admin.produtos.home');
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        

        Produto::find($id)->delete();

        $req->session()->flash('mensagem', 'Produto deletado com sucesso');

        return redirect()->route('admin.produtos.home');
    }
}
