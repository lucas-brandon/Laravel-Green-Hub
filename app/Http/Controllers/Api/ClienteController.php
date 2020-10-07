<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use http\Env\Response;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cliente::class;
    }
}
