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
    
    public function buscaTermo(Request $req)
    {        

    $categorias = Categoria::all();
    $produtos = Produto::all();

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
    }
    return response()->json('Item não encontrado', 404);
    
    }
}