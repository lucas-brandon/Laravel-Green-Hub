<?php

namespace App\Http\Controllers\Admin;

use App\Produto;
use App\Preco;
use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //
    public function index(Request $req)
    {
        $produtos = Produto::all();
        $precos = Preco::all();
        $categorias = Categoria::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.produtos.index', compact('produtos', 'precos', 'categorias', 'mensagem'));
    }


    public function adicionar()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.adicionar', compact('categorias'));
    }

    public function salvar(Request $req)
    {   

        /*categoria: ds_categoria
        produto: 'nome_produto', 'ds_produto', 'categoria_id', 'nm_marca', 'cd_barra',
        preco: 'produto_id', 'valor', 'desconto', 'fl_promocao', 'dt_vigencia_ini', 'dt_vigencia_fim',
        */
        $produto['nome_produto'] = $req['nome_produto'];
        $produto['ds_produto'] = $req['ds_produto'];
        $produto['nm_marca'] = $req['nm_marca'];
        $produto['cd_barra'] = $req['cd_barra'];

        $categoria = Categoria::where('ds_categoria', $req['ds_categoria'])->first();

        $produto['categoria_id'] = $categoria['id'];
        
        $preco['valor'] = $req['valor'];
        $preco['desconto'] = $req['desconto'];
        $preco['dt_vigencia_ini'] = $req['dt_vigencia_ini'];
        $preco['dt_vigencia_fim'] = $req['dt_vigencia_fim'];

        if($req['fl_promocao'] == null)
        {
            $preco['fl_promocao'] = false;
        } else {
            $preco['fl_promocao'] = true;
        }

        $produtoBanco = Produto::create($produto);
        $preco['produto_id'] = $produtoBanco['id'];

        //dd($req['fl_promocao']);

        Preco::create($preco);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto cadastrado com sucesso');

        return redirect()->route('admin.produtos.index');
    }
    
    public function editar($id)
    {
        $produto = Produto::find($id);
        $preco = Preco::where('produto_id', $id)->first();
        $categorias = Categoria::all();
        return view('admin.produtos.editar', compact('produto', 'preco', 'categorias'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        /*categoria: ds_categoria
        produto: 'nome_produto', 'ds_produto', 'categoria_id', 'nm_marca', 'cd_barra',
        preco: 'produto_id', 'valor', 'desconto', 'fl_promocao', 'dt_vigencia_ini', 'dt_vigencia_fim',
        */
        $produto['nome_produto'] = $req['nome_produto'];
        $produto['ds_produto'] = $req['ds_produto'];
        $produto['nm_marca'] = $req['nm_marca'];
        $produto['cd_barra'] = $req['cd_barra'];

        $categoria = Categoria::where('ds_categoria', $req['ds_categoria'])->first();

        $produto['categoria_id'] = $categoria['id'];
        
        $preco['valor'] = $req['valor'];
        $preco['desconto'] = $req['desconto'];
        $preco['dt_vigencia_ini'] = $req['dt_vigencia_ini'];
        $preco['dt_vigencia_fim'] = $req['dt_vigencia_fim'];
        
        if($req['fl_promocao'] == null)
        {
            $preco['fl_promocao'] = false;
        } else {
            $preco['fl_promocao'] = true;
        }

        //$produtoBanco = Produto::create($produto);
        Produto::find($id)->update($produto);
        $preco['produto_id'] = $id;
        Preco::where('produto_id', $id)->update($preco);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto editado com sucesso');

        return redirect()->route('admin.produtos.index');
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        $preco = Preco::where('produto_id', $id)->delete();
        
        $produto->delete();

        $req->session()->flash('mensagem', 'Produto deletado com sucesso');

        return redirect()->route('admin.produtos.index');
    }
}
