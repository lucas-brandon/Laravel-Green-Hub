<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return "Index do Pedido";
    }

    public function criar(Request $req)
    {
        dd($req->all());
        return 'criar';
    }

    public function editar()
    {
        return 'editar';
    }
}