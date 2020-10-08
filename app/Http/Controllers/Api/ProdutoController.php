<?php
namespace App\Http\Controllers\Api;

use App\Produto;
use http\Env\Response;



use Illuminate\Http\Request;

class ProdutoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Produto::class;
    }
}
