@extends('admin.produtos.layout.site')

@section('title', 'Editar produto')

@section('content')
    <div class="container">
        <h3>Editar produto</h3>
        <div class="row">
            <form action="{{route('admin.produtos.atualizar', $produto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                @include('admin.produtos.form')
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

