<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index()
    {
        //return view('admin.clientes.index', compact('clientes', 'mensagem'));
        return view('admin.clientes.index', compact('clientes', 'mensagem'));
    }


    public function salvar()
    {

    }

    public function adicionar()
    {

    }

}
