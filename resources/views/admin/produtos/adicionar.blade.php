@extends('layout.site')

@section('title', 'Adicionar produto')

@section('content')
    <div class="container">
        <h3>Adicionar produto</h3>
        <div class="row">
            <form action="{{route('admin.produtos.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.produtos.form')

                <script>
                    function getElem(elem) {
                        return document.querySelector(elem);
                    }

                                    //PREÇO//
                    
                    const preco = getElem('#valor')

                    preco.addEventListener('keypress', (e) => mascPreco(e.target.value))
                    preco.addEventListener('change', (e) => mascPreco(e.target.value))
                    const mascPreco = (valor) => {
                    	valor = valor.replace(/\D/g,'');
                    	valor = valor.replace(/(\d{1})(\d{14})$/,"$1.$2");
                    	valor = valor.replace(/(\d{1})(\d{11})$/,"$1.$2");
                    	valor = valor.replace(/(\d{1})(\d{8})$/,"$1.$2");
                    	valor = valor.replace(/(\d{1})(\d{5})$/,"$1.$2");
                        valor = valor.replace(/(\d{1})(\d{1,2})$/,"$1,$2");
                    	preco.value = valor;
                    }

                                    //DESCONTO//

                    const desconto = getElem('#desconto')
                    desconto.addEventListener('keypress', (e) => mascDesconto(e.target.value))
                    desconto.addEventListener('change', (e) => mascDesconto(e.target.value))
                    const mascDesconto = (valor) => {
                    	valor = valor.replace(/\D/g,'');
                    	desconto.value = valor;
                    }

                                    //ESTOQUE//

                    const estoque = getElem('#qtd_item')
                    estoque.addEventListener('keypress', (e) => mascEstoque(e.target.value))
                    estoque.addEventListener('change', (e) => mascEstoque(e.target.value))
                    const mascEstoque = (valor) => {
                    	valor = valor.replace(/\D/g,'');
                    	estoque.value = valor;
                    }

                </script>

                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 

