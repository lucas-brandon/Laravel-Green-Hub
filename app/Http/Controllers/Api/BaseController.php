<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    protected $classe;

    public function listar(Request $req)
    {
        $dados = $this->classe::all();

        return response()->json($dados, 201);
    }

    public function salvar(Request $req)
    {
        try{
            $dados = $req->all();

            return response()->json($this->classe::create($dados), 201);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }

        
    }

    public function buscar($id)
    {
        $dados = $this->classe::find($id);
        if (is_null($dados)) {
            return response()->json('Item não encontrado', 404);
        }
        if ($dados['imagem'] != '') {
            $dados['imagem'] = url($dados['imagem']);
        }

        return response()->json($dados, 200);
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        $item = $this->classe::find($id);

        if (is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        return response()->json($item->update($dados), 200);
    }

    public function deletar($id)
    {
        $item = $this->classe::find($id);

        if (is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $item->delete();

        return response()->json('Item Removido', 200);
    }
}
