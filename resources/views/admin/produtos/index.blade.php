@extends('layout.site')

@section('title', 'Lista de Produtos')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Lista de Produtos</h3>

        @if(!@empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif

        <div class="row d-flex justify-content-end" style="margin-bottom: 25px">
            <a href="{{route('admin.produtos.adicionar')}}" class="btn btn-success">Adicionar produto</a>
        </div>

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
                        <th scope="col">Quantidade</th>
                        <th scope="col">Status Produto</th>
                        <th scope="col">Imagens</th>
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
                            @foreach ($estoques as $estoque)
                            @if ($produto->id == $estoque->produto_id)
                                <td>{{ $estoque->qtd_item }}</td>
                            @endif
                            @endforeach
                            <td>    
                                @if ($produto->status_produto == '1')
                                    {{"Produto Ativo"}}
                                @elseif ($produto->status_produto == '2')
                                    {{"Produto Inativo"}}
                                @endif
                            </td>

                            @foreach ($imagens as $img)
                            @if ($produto->id == $img->produto_id)
                            <td>
                                <img width="70" src="{{$img->link_imagem}}">
                            </td>
                            @endif
                            @endforeach
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.produtos.editar', $produto->id)}}">Editar</a>
                                {{--
                                <form action="{{route('admin.produtos.deletar', $produto->id)}}" method="POST">
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
            {{$produtos->links()}}
        </div>
        
    </div>
    
@endsection