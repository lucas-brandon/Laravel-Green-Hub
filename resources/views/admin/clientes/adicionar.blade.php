@extends('admin.clientes.layout.site')

@section('title', 'Adicionar cliente')

@section('content')
    <div class="container">
        <h3>Adicionar cliente</h3>
        <div class="row">
            <form action="{{route('admin.clientes.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

