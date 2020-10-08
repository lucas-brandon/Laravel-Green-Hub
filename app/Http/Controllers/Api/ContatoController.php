<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Contato::class;
    }
}
