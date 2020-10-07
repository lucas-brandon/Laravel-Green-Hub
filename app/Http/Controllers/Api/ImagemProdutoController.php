<?php

namespace App\Http\Controllers\Api;

use App\ImagemProduto;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagemProdutoController extends BaseController
{
    public function __construct()
    {
        $this->classe = ImagemProduto::class;
    }
}
