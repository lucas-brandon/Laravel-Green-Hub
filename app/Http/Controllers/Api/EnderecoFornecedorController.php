<?php

namespace App\Http\Controllers\Api;

use App\EnderecoFornecedor;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnderecoFornecedorController extends BaseController
{
    public function __construct()
    {
        $this->classe = EnderecoFornecedor::class;
    }
}
