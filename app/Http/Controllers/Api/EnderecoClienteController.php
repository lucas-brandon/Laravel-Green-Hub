<?php

namespace App\Http\Controllers\Api;

use App\EnderecoCliente;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnderecoClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = EnderecoCliente::class;
    }
}
