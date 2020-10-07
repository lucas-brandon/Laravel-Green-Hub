<?php
namespace App\Http\Controllers\Api;

use App\Pagamento;
use http\Env\Response;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagamentoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Pagamento::class;
    }
}
