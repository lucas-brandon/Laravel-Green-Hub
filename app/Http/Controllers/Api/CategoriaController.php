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
}