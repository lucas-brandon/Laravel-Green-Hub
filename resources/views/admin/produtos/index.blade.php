@extends('layout.site')

@section('title', 'Produtos Título')

@section('content')
    <div class="container">
        <h3>Lista de Produtos</h3>

        @if(!@empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif

        <!--'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra'-->
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Preço (R$)</th>
                        <th scope="col">Código de Barra</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome_produto }}</td>
                            <td>{{ $produto->nm_marca }}</td>
                            @foreach ($precos as $preco)
                                @if ($produto->id == $preco->produto_id)
                                    <td>{{ $preco->valor }}</td>
                                @endif
                            @endforeach
                            <td>{{ $produto->cd_barra }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.produtos.editar', $produto->id)}}">Editar</a>

                                <form action="{{route('admin.produtos.deletar', $produto->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{route('admin.produtos.adicionar')}}" class="btn btn-success">Adicionar produto</a>
        </div>
    </div>
    
@endsection

