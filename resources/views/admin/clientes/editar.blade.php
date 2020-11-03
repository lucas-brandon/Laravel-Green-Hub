@extends('layout.site')

@section('title', 'Editar cliente')

@section('content')
    <div class="container">
        <h3>Editar cliente</h3>
        <div class="row">
            <form action="{{route('admin.clientes.atualizar', $cliente->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                @include('admin.clientes.form')

                <div class="form-group">
                    <label for="status_cliente">Status do cliente</label>
                        <select class="form-control" id="status_cliente" name="status_cliente">
                                
                                <option value="1">{{ "Ativo" }}</option>
                                <option value="2">{{"Inativo"}}</option>

                                @if("Ativo")
                                {{$cliente->status_cliente = true}}
                                @elseif("Inativo")
                                {{$cliente->status_cliente = false}}
                                @endif
                                

                       </select>
                    </div>

                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

