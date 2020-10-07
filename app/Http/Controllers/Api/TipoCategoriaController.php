<?php
namespace App\Http\Controllers\Api;

use App\TipoCategoria;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoCategoriaController extends BaseController
{
    public function __construct()
    {
        $this->classe = TipoCategoria::class;
    }
}
