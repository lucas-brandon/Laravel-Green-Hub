@extends('admin.pedidos.layout.site')

@section('title', 'Editar pedido')

@section('content')
    <div class="container">
        <h3>Editar pedido</h3>
        <div class="row">
            <form action="{{route('admin.pedidos.atualizar', $pedido->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                @include('admin.pedidos.form')
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

