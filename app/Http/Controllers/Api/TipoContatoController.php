<?php
namespace App\Http\Controllers\Api;

use App\TipoContato;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoContatoController extends BaseController
{
    public function __construct()
    {
        $this->classe = TipoContato::class;
    }
}
