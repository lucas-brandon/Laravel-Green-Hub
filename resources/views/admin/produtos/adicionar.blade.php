@extends('admin.produtos.layout.site')

@section('title', 'Adicionar produto')

@section('content')
    <div class="container">
        <h3>Adicionar produto</h3>
        <div class="row">
            <form action="{{route('admin.produtos.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.produtos.form')
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

