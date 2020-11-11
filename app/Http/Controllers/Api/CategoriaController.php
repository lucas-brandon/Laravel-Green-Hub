<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Produto;
use App\Preco;
use App\ImagemProduto;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends BaseController
{

    public function __construct()
    {
        $this->classe = Categoria::class;
    } 

    public function buscarProdutos($id)
    {
        $categoria = Categoria::find($id);

        //dd($categoria);

        $produtos = Produto::all();
        $precos = Preco::all();
        $imagens = ImagemProduto::all();

        if (is_null($categoria)) {
            return response()->json('Item não encontrado', 404);
        }

        $array = array();
        foreach ($produtos as $produto){
            if($produto['categoria_id'] == $id){
                $dado = $produto;
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
                            
                foreach($imagens as $img)
                {
                    if ($produto->id == $img->produto_id)
                    {
                        $dado['link_imagem'] = url($img['link_imagem']);
                    }
                }
                array_push($array, $dado);
                
            }
        }
        return response()->json($array, 200);
    }
    
    public function buscaTermo($termo)
    {   
        $array = array();             
        $categorias = Categoria::all();
        $produtos = Produto::all();
        //dd($termo);
        $s = '%'.$termo.'%';

        $findProdutos = Produto::where('nome_produto', 'like', $s)
                                ->orWhere('nm_marca', 'like', $s)
                                ->get();

                                
        /*
        foreach($categorias as $ctg)
        {
            if($req->descricao == $ctg->descricao){
                return response()->json($ctg, 200);
            }           
        } 
        
        foreach($produtos as $prod)
        {
            if($req->nome_produto == $prod->nome_produto){
                return response()->json($prod, 200);
            }

            if($req->nm_marca == $prod->nm_marca){
                return response()->json($prod, 200);
            }
            
        }
        */
        if(is_null($findProdutos)){
            return response()->json('Item não encontrado', 404);
        }

        foreach($findProdutos as $produto)
        {
            $preco = Preco::where('produto_id', $produto->id)->first();
            $produto['preco_valor'] = $preco->valor;
            $produto['preco_fl_promocao'] = $preco->fl_promocao;
            $produto['preco_desconto'] = $preco->desconto;
            $produto['preco_dt_vigencia_ini'] = $preco->dt_vigencia_ini;
            $produto['preco_dt_vigencia_fim'] = $preco->dt_vigencia_fim;

            $img = ImagemProduto::where('produto_id', $produto->id)->first();
            $produto['link_imagem'] = url($img['link_imagem']);
            
        }

        return response()->json($findProdutos, 200);

    }
}