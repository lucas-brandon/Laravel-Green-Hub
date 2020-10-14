<?php
namespace App\Http\Controllers\Api;

use App\Preco;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrecoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Preco::class;
    }
}
