<?php

namespace App\Http\Controllers\Api;


use App\Curso;
use http\Env\Response;
use App\Pedido;
use App\PedidoItem;
use App\StatusPedido;
use App\Pagamento;
use App\Preco;
use App\Estoque;
use App\Cliente;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\GreenHub;
use stdClass;

class PedidoController extends BaseController
{
    /*
    Pedido_Item
    $table->foreignId('pedido_id');
    $table->foreignId('produto_id');
    $table->string('valor_unitario');
    $table->foreignId('qtd_item');

    Pedido
    /*
    $table->foreignId('cliente_id')->nullable();
    $table->foreignId('status_pedido_id')->nullable();
    $table->foreignId('pagamento_id')->nullable();
    $table->bigInteger('nr_pedido');
    $table->date('dt_pedido');
    $table->float('valor');
    */

    public function __construct()
    {
        $this->classe = Pedido::class;
    }

    public function cadastro(Request $req)
    {
        try{
            $produtos = $req['produtos'];
            foreach ($produtos as $produto) {
                $estoqueBanco =  Estoque::where('produto_id', $produto['id'])->first();
                if ($estoqueBanco['qtd_item'] < $produto['qtd_item']) {
                    return response()->json('Quantidade indisponivel', 400);
                }
            }
            //$produtos = $req->all();
            $status = StatusPedido::where('ds_status', 'Em Andamento')->first();

            $pagamento = Pagamento::where('ds_pagamento', 'Cartão de crédito')->first();

            $frete = 15.0;

            $pedido['cliente_id'] = $req['cliente_id'];
            $pedido['nr_pedido'] = $req['nr_pedido'];
            $pedido['dt_pedido'] = $req['dt_pedido'];
            $pedido['status_pedido_id'] = $status['id'];
            $pedido['pagamento_id'] = $pagamento['id'];
            $pedido['valor'] = 0.0;

            $pedidoBanco = Pedido::create($pedido);


            $valorTotal = 0;
            foreach ($produtos as $produto) {
                $item['pedido_id'] = $pedidoBanco['id'];
                $item['produto_id'] = $produto['id'];
                $item['valor_unitario'] = Preco::where('produto_id', $produto['id'])->first()['valor'];
                $item['qtd_item'] = $produto['qtd_item'];

                $estoqueBanco =  Estoque::where('produto_id', $produto['id'])->first();
                $estoque['qtd_item'] = $estoqueBanco['qtd_item'] - $item['qtd_item'];
                $estoque['produto_id'] = $estoqueBanco['produto_id'];
                Estoque::where('produto_id', $produto['id'])->update($estoque);


                PedidoItem::create($item);

                $valorTotal += $item['valor_unitario'] * $item['qtd_item'];
                //return response()->json($produto, 200);
            }


            $valorTotal += $frete;
            $pedido['valor'] = $valorTotal;

            $pedidoBanco->update($pedido);

            //$clienteBanco = Cliente::find($req['cliente_id']);
            $user = new stdClass();
            $user->name = $req['name'];
            $user->email = $req['email'];
            $user->msg = $req['msg'];
            $user->subject = $req['assunto'];

            Mail::send(new GreenHub($user));

            return response()->json($pedido, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function listar(Request $req)
    {
        try{
            $pedidos = Pedido::all();
            $dados = array();

            foreach ($pedidos as $pedido) {
                $status = StatusPedido::where('id', $pedido['status_pedido_id'])->first();

                $pedido['ds_status'] = $status['ds_status'];
                //$pedido['dt_pedido'] = $pedido['dt_pedido']->format('dd/mm/YY')
                //$d = 

                $pedido['dt_pedido'] = date('d/m/Y', strtotime($pedido->dt_pedido));

                //dd($pedido);

                array_push($dados, $pedido);
            }

            return response()->json($dados, 201);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function listarProdutos($id)
    {
        $pedidoItens = PedidoItem::all();
        $dados = array();

        foreach ($pedidoItens as $item) {
            if ($item['pedido_id'] == $id) {
                array_push($dados, $item);
            }
        }

        return response()->json($dados, 201);
    }
}
