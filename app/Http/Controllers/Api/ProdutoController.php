<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Produto;
use App\Preco;
use App\Categoria;
use App\Estoque;
use App\ImagemProduto;
use http\Env\Response;



use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    
    public function listar(Request $req)
    {
        $array = array();
        $produtos = Produto::all();
        $precos = Preco::all();
        $categorias = Categoria::all();
        $imagensProdutos = ImagemProduto::all();
        
        
        foreach($produtos as $produto)
        {
            $dado['id'] = $produto->id;
            $dado['nm_produto'] = $produto->nome_produto;
            $dado['nm_marca'] = $produto->nm_marca;
            foreach($categorias as $categoria)
            {
                if ($produto->categoria_id == $categoria->id)
                {
                    $dado['categoria'] = $categoria->descricao;
                }    
            }
            foreach ($precos as $preco)
            {
                if ($produto->id == $preco->produto_id)
                {
                    $dado['preco_valor'] = $preco->valor;
                    $dado['preco_fl_promocao'] = $preco->fl_promocao;
                    $dado['preco_desconto'] = $preco->desconto;
                    $dado['preco_dt_vigencia_ini'] = $preco->dt_vigencia_ini;
                    $dado['preco_dt_vigencia_fim'] = $preco->dt_vigencia_fim;
                }
            }
            $dado['cd_barra'] = $produto->cd_barra;
            
            foreach($imagensProdutos as $imagem)
            {
                if ($imagem->produto_id == $produto->id)
                {
                    $dado['link_imagem'] = $imagem->link_imagem;
                }
            }
            array_push($array, $dado);
            
        }
        return response()->json($array, 201);
    }
    

    public function salvar(Request $req)
    {   
        $produto['nome_produto'] = $req['nome_produto'];
        $produto['ds_produto'] = $req['ds_produto'];
        $produto['nm_marca'] = $req['nm_marca'];
        $produto['cd_barra'] = $req['cd_barra'];

        $categoria = Categoria::where('descricao', $req['ds_categoria'])->first();

        if(is_null($categoria))
        {
            return response()->json('Categoria inválida', 200);
        }

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
        
        if ($req->hasFile('imagem')) {
            $imagemProduto['produto_id'] = $produtoBanco['id'];
            $imagemProduto['link_imagem'] = $this->tratarImagem($req);
            $imagemProduto['descricao'] = $req['ds_imagem'];
            ImagemProduto::create($imagemProduto);
        }

        $dado = $produtoBanco;
        $dado['categoria_id'] = $categoria['id'];
        $dado['ds_categoria'] = $req['ds_categoria'];
        $dado['valor'] = $preco['valor'];
        $dado['fl_promocao'] = $preco['fl_promocao'];

        


        //Cria uma variavel mensagem na sessão atual
        //$req->session()->flash('mensagem', 'Produto cadastrado com sucesso');

        //return redirect()->route('admin.produtos.index');
        return response()->json($dado, 201);
    }

    public function buscar($id)
    {
        $dados = Produto::find($id);
        $preco = Preco::where('produto_id', $id)->first();

        if (is_null($dados)) {
            return response()->json('Produto não encontrado', 404);
        }

<<<<<<< HEAD
        $preco = Preco::where('produto_id', $id)->first();
=======
        if (is_null($preco)) {
            return response()->json('Preço não encontrado', 404);
        }

>>>>>>> 28efe22f42a67a8926ac32c88350cd63d2a21d8d
        $dados['valor'] = $preco['valor'];

        return response()->json($dados, 200);
    }

    public function buscarNome($nome)
    {
        $dados = Produto::where('nome_produto', $nome)->get();
        if (is_null($dados)) {
            return response()->json('Produto não encontrado', 404);
        }

        return response()->json($dados, 200);
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
        $produtoBanco = Produto::find($id);

        if (is_null($produtoBanco)){
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }

        $produtoBanco->update($produto);
        $preco['produto_id'] = $id;
        Preco::where('produto_id', $id)->update($preco);

        $dado = $produtoBanco;
        $dado['categoria_id'] = $categoria['id'];
        $dado['ds_categoria'] = $req['ds_categoria'];
        $dado['valor'] = $preco['valor'];
        $dado['fl_promocao'] = $preco['fl_promocao'];
        $dado['qtd_item_estoque'] = $req['qtd_item_estoque'];

        return response()->json($dado, 200);
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        
        if (is_null($produto)) {
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }

        Estoque::where('produto_id', $id)->delete();
        Preco::where('produto_id', $id)->delete();

        $produto->delete();

        return response()->json('Produto Removido', 200);
    }

    public function tratarImagem(Request $req)
    {
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'img/cursos/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
}
