@extends('admin.pedidos.layout.site')

@section('title', 'Adicionar pedido')

@section('content')
    <div class="container">
        <h3>Adicionar pedido</h3>
        <div class="row">
            <form action="{{route('admin.pedidos.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.pedidos.form')
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

