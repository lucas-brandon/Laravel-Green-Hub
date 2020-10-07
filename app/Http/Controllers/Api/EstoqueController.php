<?php

namespace App\Http\Controllers\Api;

use App\Estoque;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstoqueController extends BaseController
{
    public function __construct()
    {
        $this->classe = Estoque::class;
    }
}
