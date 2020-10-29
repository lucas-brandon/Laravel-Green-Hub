<?php

namespace App\Http\Controllers\Api;

use App\ImagemProduto;
use App\Produto;
use http\Env\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagemProdutoController extends BaseController
{
    public function salvar(Request $req)
    {
        $imagens['produto_id'] = $req['produto_id'];
        $imagens['link_imagem'] = $req['link_imagem'];
        $imagens['descricao'] = $req['descricao'];
        ImagemProduto::create($imagens);

        return response()->json('Imagem criada',200);
    }
}