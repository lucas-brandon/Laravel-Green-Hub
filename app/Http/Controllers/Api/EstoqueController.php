<?php

namespace App\Http\Controllers\Api;

use App\Estoque;
use App\Produto;
use http\Env\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EstoqueController extends BaseController
{
    public function __construct()
    {
        $this->classe = Estoque::class;
    }

    public function buscar($id)
    {
        $estoques = Estoque::all();

        foreach ($estoques as $estoque) {

            if ($estoque['produto_id'] == $id) {
                return response()->json($estoque, 201);
            }
        }
        return response()->json('Produto não encontrado', 404);
    }

    public function salvar(Request $req)
    {
        $produtos = Produto::all();

        foreach ($produtos as $produto) {

            if ($produto['id'] == $req['produt_id']) {
                $estoque['produto_id'] = $req['produt_id'];
                $estoque['qtd_item'] = $req['qtd_item'];

                Estoque::create($estoque);

                return response()->json($estoque, 201);
            }
        }
        return response()->json('Produto não encontrado', 404);
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';


        $estoque = Estoque::where('produto_id', $req['produto_id']);
        
        if(is_null($estoque)){
            return response()->json('Produto não encontrado. Falha ao atualizar', 404);
        }
        $estoque->update($req->all());

        return response()->json($req->all(), 200);
    }

    public function deletar($id)
    {
        $estoque = Estoque::where('produto_id', $id);

        if(is_null($estoque)){
            return response()->json('Produto não encontrado. Falha ao deletar', 404);
        }

        $estoque->delete();
        return response()->json('Produto deletado do estoque', 200);
    }
}
