<?php
namespace App\Http\Controllers\Api;

use App\PedidoItem;
use http\Env\Response;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoItemController extends BaseController
{
    public function __construct()
    {
        $this->classe = PedidoItem::class;
    }
}
