<?php

namespace App\Http\Controllers\Api;

use App\Estoque;
use App\Produto;
use http\Env\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EstoqueController extends Controller
{

    public function busca($id)
    {
        $estoques = Estoque::all();

        foreach ($estoques as $estoque) {

            if ($estoque['id'] == $id) {
                return response()->json($estoque, 201);
            }
        }
        return response()->json('Produto não encontrado', 404);
    }

    public function salvar(Request $req)
    {
        $produtos = Produto::all();

        foreach ($produtos as $produto) {

            if ($produto['id'] == $req['id']) {
                $estoque['produto_id'] = $req['id'];
                $estoque['qtd_item'] = $req['qtd_item'];

                Estoque::create($estoque);

                return response()->json('Produto não encontrado', 404);
            }
        }
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';


        Estoque::where('produto_id', $id)->update($req->all());

        return response()->json($req, 201);
    }

    public function deletar($id)
    {
        Estoque::where('produto_id', $id)->delete();

        return response()->json('Produto deletado', 404);;
    }
}
