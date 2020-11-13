<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use App\Cliente;
use App\StatusPedido;
use App\Pagamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    //
    public function index(Request $req)
    {
        //'cliente_id', 'status_pedido_id', 'pagamento_id', 'nr_pedido', 'dt_pedido',
        $clientes = Cliente::all();
        $statusPedidos = StatusPedido::all();
        $pagamentos = Pagamento::all();
        $pedidos = Pedido::all();

        foreach ($pedidos as $pedido) {
            $pedido['dt_pedido'] = date('d/m/Y', strtotime($pedido->dt_pedido));

            $pedido['valor'] = number_format($pedido['valor'], 2, ',', '');
        }

        $mensagem = $req->session()->get('mensagem');
        return view('admin.pedidos.index', compact('pedidos', 'clientes', 'statusPedidos', 'pagamentos','mensagem'));
    }


    public function adicionar()
    {
        $clientes = Cliente::all();
        $statusPedidos = StatusPedido::all();
        $pagamentos = Pagamento::all();
        return view('admin.pedidos.adicionar', compact('clientes', 'statusPedidos', 'pagamentos'));
        
    }

    public function salvar(Request $req)
    {
        //'nome_pedido', 'ds_pedido', 'nm_marca', 'cd_barra',
        
        $pedido = $req->all();
        //dd($pedido);

        Pedido::create($pedido);

        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Pedido cadastrado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }
    
    public function editar($id)
    {
        $clientes = Cliente::all();
        $statusPedidos = StatusPedido::all();
        $pagamentos = Pagamento::all();
        
        $pedido = Pedido::find($id);
        return view('admin.pedidos.editar', compact('pedido', 'clientes', 'statusPedidos', 'pagamentos'));
    }

    public function atualizar(Request $req, $id)
    {
        //echo 'salvando no banco';
        $pedido = $req->all();

        Pedido::find($id)->update($pedido);
        /*
        $user = new stdClass();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->msg = $req['msg'];
        $user->subject = $req['assunto'];

        Mail::send(new GreenHub($user));
        */
        //Cria uma variavel mensagem na sessão atual
        $req->session()->flash('mensagem', 'Pedido editado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }

    public function deletar(Request $req, $id)
    {
        $pedido = Pedido::find($id);
        

        Pedido::find($id)->delete();

        $req->session()->flash('mensagem', 'Pedido deletado com sucesso');

        return redirect()->route('admin.pedidos.index');
    }
}
