<?php

namespace App\Http\Controllers\Admin;

use App\Produto;
use App\Preco;
use App\Categoria;
use App\Estoque;
use App\ImagemProduto;
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
        $estoques = Estoque::all();
        $imagens = ImagemProduto::all();
        $mensagem = $req->session()->get('mensagem');
        return view('admin.produtos.index', compact('produtos', 'precos', 'categorias', 'mensagem', 'estoques', 'imagens'));
    }


    public function adicionar()
    {
        $categorias = Categoria::all();
        $estoques = Estoque::all();
        return view('admin.produtos.adicionar', compact('categorias','estoques'));
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

        $categoria = Categoria::where('descricao', $req['ds_categoria'])->first();

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
        
        $estoque['produto_id'] = $produtoBanco['id'];
        $estoque['qtd_item'] = $req['qtd_item'];


        Estoque::create($estoque);

        //dd($req['fl_promocao']);

        Preco::create($preco);
        $imagens = $req->all();
        
        if ($req->hasFile('link_imagem')){
            $imagens['link_imagem'] = $this->tratarImagem($req, $imagens);
        }

        Produto::create($imagens);
        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto cadastrado com sucesso');

        return redirect()->route('admin.produtos.index');
    }
    
    public function editar($id)
    {   
        $produto = Produto::find($id);
        $preco = Preco::where('produto_id', $id)->first();
        $categorias = Categoria::all();
        $estoques = Estoque::all();
        return view('admin.produtos.editar', compact('produto', 'preco', 'categorias', 'estoques'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        /*categoria: descricao
        produto: 'nome_produto', 'ds_produto', 'categoria_id', 'nm_marca', 'cd_barra',
        preco: 'produto_id', 'valor', 'desconto', 'fl_promocao', 'dt_vigencia_ini', 'dt_vigencia_fim',
        */
        $produto['nome_produto'] = $req['nome_produto'];
        $produto['ds_produto'] = $req['ds_produto'];
        $produto['nm_marca'] = $req['nm_marca'];
        $produto['cd_barra'] = $req['cd_barra'];

        $categoria = Categoria::where('descricao', $req['ds_categoria'])->first();

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

        $estoque['qtd_item'] = $req['qtd_item'];
        $estoque['produto_id'] = $req['id'];
        Estoque::where('produto_id', $id)->update($estoque);

        ///////
        //{
        //    $requisicao = $req->all();
    //
        //    if ($req->hasFile('imagem')) {
        //        $requisicao['imagem'] = $this->tratarImagem($req, $requisicao);
        //    }
    //
        //    $curso = Curso::find($id);
        //    $curso->update($requisicao);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Produto editado com sucesso');

        return redirect()->route('admin.produtos.index');
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        $preco = Preco::where('produto_id', $id)->delete();
        $estoque = Estoque::where('produto_id', $id)->delete();
        
        $produto->delete();

        $req->session()->flash('mensagem', 'Produto deletado com sucesso');

        return redirect()->route('admin.produtos.index');
    }

    public function tratarImagem(Request $req, $imagens)
    {
        $imagem = $req->file('link_imagem');
        $num = rand(1111, 9999);
        $dir = 'img/teste/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
}
