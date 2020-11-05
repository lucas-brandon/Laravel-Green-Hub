@extends('layout.site')

@section('title', 'Adicionar cliente')

@section('content')
    <div class="container">
        <h3>Adicionar cliente</h3>
        <div class="row">
            <form action="{{route('admin.clientes.salvar', 'contatos')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')

                <script>

                            //CPF//
                        const cpf = document.getElementById('cpf')

                        cpf.addEventListener('keypress', (e) => mascaraCPF(e.target.value))
                        cpf.addEventListener('change', (e) => mascaraCPF(e.target.value))

                        const mascaraCPF = (valor) => {
                        valor = valor.replace(/\D/g, "")
                        valor = valor.replace(/^(\d{3})(\d)/, "$1.$2")
                        valor = valor.replace(/(\d{3})(\d)/, "$1.$2")
                        valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
                        
                        cpf.value = valor 
                        }
                    
                                            //TELEFONE//
                        const tel = document.getElementById('telefone')
                    
                        tel.addEventListener('keypress', (e) => mascaraTel(e.target.value)) // Dispara quando digitado no campo
                        tel.addEventListener('change', (e) => mascaraTel(e.target.value)) // Dispara quando autocompletado o campo
                    
                        const mascaraTel = (valor) => {
                        valor = valor.replace(/\D/g, "")
                        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
                        valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
                        tel.value = valor 
                        }

                                            //DATA NASCIMENTO//
            
                        function validarData(){
                        let data = document.getElementById("dt-nascimento").value;

                        data = data.replace(/\//g, "-"); // substitui '/' por '-'
                        let data_array = data.split("-"); // quebra em array

                        if(data_array[0].length != 4){
                           data = data_array[2]+"-"+data_array[1]+"-"+data_array[0]; // remonto a data no formato yyyy/MM/dd
                        }

                        // compara as datas e calcula a idade
                        let hoje = new Date();
                        let nasc  = new Date(data);
                        let idade = hoje.getFullYear() - nasc.getFullYear();
                        let diferencaMes = hoje.getMonth() - nasc.getMonth();
                        if (diferencaMes < 0 || (diferencaMes === 0 && hoje.getDate() < nasc.getDate())) idade--;

                        if(idade < 18){
                            document.getElementById("aviso-data").style.display = "block";
                        }
                        }
                </script>
                
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 