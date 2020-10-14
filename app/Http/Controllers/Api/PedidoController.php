<?php

namespace App\Http\Controllers\Api;


use App\Curso;
use http\Env\Response;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Pedido::class;
    }
}
