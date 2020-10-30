@extends('layout.site')

@section('title', 'Pedidos Título')

@section('content')
    <div class="container">
        <h3>Lista de Pedidos</h3>

        @if(!@empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif

        <!--protected $fillable = [
            'nr_pedido', 'dt_pedido',
        ];-->
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
                                @if (isset($pedido->status_pedido_id) && $pedido->status_pedido_id == $status->id)
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

                                {{--
                                <form action="{{route('admin.pedidos.deletar', $pedido->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                                --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>{{--
        <div class="row">
            <a href="{{route('admin.pedidos.adicionar')}}" class="btn btn-success">Adicionar pedido</a>
        </div>
        --}}
    </div>
    
@endsection

