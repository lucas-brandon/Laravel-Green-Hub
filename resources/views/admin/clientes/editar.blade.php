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
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

