@extends('layout.site')

@section('title', 'Adicionar cliente')

@section('content')
    <div class="container">
        <h3>Adicionar cliente</h3>
        <div class="row">
            <form name="form" action="{{route('admin.clientes.salvar', 'contatos')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')

               
                
                <button type="submit" class="btn btn-success" 
                onclick='return validadata()'>Salvar</button>
                <!--onclick vai retornar a validaçao do campo data de nascimento-->
            </form>
        </div>    
    </div>
@endsection() 