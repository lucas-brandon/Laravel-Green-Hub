@extends('layout.site')

@section('title', 'Editar produto')

@section('content')
    <div class="container">
        <h3>Editar produto</h3>
        <div class="row">
            <form action="{{route('admin.produtos.atualizar', $produto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                @include('admin.produtos.form')

                <div class="form-group">
                    <label for="status_cliente">Status do produto</label>
                    <select class="form-control" id="status_produto" name="status_produto">     
                        <option value="1">{{ "Ativo" }}</option>
                        <option value="2">{{"Inativo"}}</option>

                        @if("Ativo")
                            {{$produto->status_produto = true}}
                        @elseif("Inativo")
                            {{$produto->status_produto = false}}
                        @endif
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success" onclick='return compararData()'>Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

