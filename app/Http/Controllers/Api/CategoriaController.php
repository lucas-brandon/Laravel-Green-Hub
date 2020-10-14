<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Produto;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{

    public function listar()
    {
        $categorias = Categoria::all();

        return response()->json($categorias, 201);

    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        return response()->json(Categoria::create($dados), 201);
    }

    public function deletar($id)
    {
        $categoria = Categoria::find($id);

        if (is_null($categoria)){
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $categoria->delete();

        return response()->json('Item Removido', 200);
    }


    public function buscar($id)
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