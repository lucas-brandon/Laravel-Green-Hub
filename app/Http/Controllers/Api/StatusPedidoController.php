<?php

namespace App\Http\Controllers\Api;

use App\StatusPedido;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusPedidoController extends BaseController
{
    public function __construct()
    {
        $this->classe = StatusPedido::class;
    }
}
