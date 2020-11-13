@extends('layout.site')

@section('title', 'Adicionar produto')

@section('content')
    <div class="container">
        <h3>Adicionar produto</h3>
        <div class="row">
            <form action="{{route('admin.produtos.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.produtos.form')

 

                <button type="submit" class="btn btn-success" onclick='return compararData()'>Salvar</button>
                
            </form>
        </div>    
    </div>
@endsection()