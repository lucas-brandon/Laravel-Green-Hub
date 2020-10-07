<?php

namespace App\Http\Controllers\Api;

use App\CartaoCliente;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartaoClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = CartaoCliente::class;
    }
}
