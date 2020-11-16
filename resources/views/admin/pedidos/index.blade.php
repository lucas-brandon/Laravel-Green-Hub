@extends('layout.site')

@section('title', 'Lista de Pedidos')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Lista de Pedidos</h3>

        @if(!@empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Número do pedido</th>
                        <th scope="col">Data de criação do pedido</th>
                        <th scope="col">Valor total do pedido</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>

                            <td>{{ $pedido->id }}</td>

                            @foreach ($statusPedidos as $status)
                                @if ($pedido->status_pedido_id == $status->id)
                                   <td>{{$status->ds_status}}</td>
                                @endif
                            @endforeach

                            @foreach ($clientes as $cliente)
                                @if (isset($pedido->cliente_id) && $pedido->cliente_id == $cliente->id)
                                    <td>{{$cliente->nome}}</td>
                                @endif
                            @endforeach
                            <td>{{ $pedido->nr_pedido }}</td>
                            <td>{{ $pedido->dt_pedido }}</td>
                            <td>{{ $pedido->valor ?? '' }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.pedidos.editar', $pedido->id)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      
    </div>
    
@endsection

