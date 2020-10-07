<?php

namespace App\Http\Controllers\Api;

use App\Endereco;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnderecoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Endereco::class;
    }
}
