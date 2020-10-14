<?php

namespace App\Http\Controllers\Api;

use App\Fornecedor;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends BaseController
{
    public function __construct()
    {
        $this->classe = Fornecedor::class;
    }
}
