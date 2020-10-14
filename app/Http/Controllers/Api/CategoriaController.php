<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use http\Env\Response;



use Illuminate\Http\Request;

class CategoriaController extends BaseController
{
    //public function __construct()
    //{
    //    $this->classe = Categoria::class;
    //}

    public function listar()
    {
        return response()->json(Categoria::all(), 200);
    }

}