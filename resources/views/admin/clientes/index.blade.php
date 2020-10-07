@extends('layout.site')

@section('title', 'Clientes Título')

@section('content')
    <div class="container">
        <h3>Lista de Clientes</h3>

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
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Senha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->sobrenome }}</td>
                            <td>{{ $cliente->dt_nascimento }}</td>
                            <td>{{ $cliente->senha }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.clientes.editar', $cliente->id)}}">Editar</a>

                                <form action="{{route('admin.clientes.deletar', $cliente->id)}}" method="POST">
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
            <a href="{{route('admin.clientes.adicionar')}}" class="btn btn-success">Adicionar cliente</a>
        </div>
    </div>
    
@endsection

