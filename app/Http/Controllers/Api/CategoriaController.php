<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Produto;
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

        if (is_null($categoria)) {
            return response()->json('Item não encontrado', 404);
        }

        $valor = array();
        foreach ($produtos as $produto){
            if($produto['categoria_id'] == $id){
                $valor[] = $produto;
            }
        }

        return response()->json($valor, 200);
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