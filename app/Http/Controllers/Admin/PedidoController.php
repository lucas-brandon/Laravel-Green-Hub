<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use App\Cliente;
use App\StatusPedido;
use App\Pagamento;
use App\Contato;
use App\TipoContato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\GreenHub;
use stdClass;

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
        $f = Pedido::find($id);
        $cliente = Cliente::find($f['cliente_id']);
        $tipo_contato1 = TipoContato::where('descricao', 'email')->first();

        $tipoEmail = Contato::where('cliente_id', $f['cliente_id'])->where('tipo_contato_id', $tipo_contato1['id'])->first();

        //dd($tipoEmail);

        $status = StatusPedido::where('ds_status', $req['status'])->first();    

        $pedido['status_pedido_id'] = $status['id'];
        //dd($pedido);

        Pedido::find($id)->update($pedido);
        
        $user = new stdClass();
        $user->name = $cliente['nome'];
        $user->email = $tipoEmail['ds_contato'];
        $user->msg = "O pedido de número ".$f['nr_pedido']." foi atualizado com o status: ".$req['status'];
        $user->subject = "Pedido ".$req['status'];

        Mail::send(new GreenHub($user));
        
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
