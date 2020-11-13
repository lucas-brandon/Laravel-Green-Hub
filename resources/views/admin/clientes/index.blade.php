@extends('layout.site')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Lista de Clientes</h3>

        @if(!@empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif
        <!--<div class="row d-flex justify-content-end" style="margin-bottom: 25px">
            <a href="//route('admin.clientes.adicionar')}}" class="btn btn-success">Adicionar cliente</a>
        </div>-->

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Status Cliente</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->sobrenome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ date ('d/m/Y', strtotime( $cliente->dt_nascimento)) }}</td>
                            <td>
                            @foreach ($contatos as $contato)
                                
                                @if ($contato->tipo_contato_id == $tipo_email->id && $contato->cliente_id == $cliente->id)
                                    {{ $contato->ds_contato }}<br>
                                @endif
                            @endforeach

                            </td>
                            <td>
                                @foreach ($contatos as $contato)
                                    
                                    @if ($contato->tipo_contato_id == $tipo_telefone->id && $contato->cliente_id == $cliente->id)
                                        {{ $contato->ds_contato }}<br>
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @if ($cliente->status_cliente == '1')
                                    {{"Cliente Ativo"}}
                                @elseif ($cliente->status_cliente == '2')
                                    {{"Cliente Inativo"}}
                                @endif

                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.clientes.editar', $cliente->id, $contatos)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$clientes->links()}}
        </div>
      
    </div>
    
@endsection