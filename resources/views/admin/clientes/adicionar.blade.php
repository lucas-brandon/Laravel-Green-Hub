@extends('layout.site')

@section('title', 'Adicionar cliente')

@section('content')
    <div class="container">
        <h3>Adicionar cliente</h3>
        <div class="row">
            <form name="form" action="{{route('admin.clientes.salvar', 'contatos')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')

                <script>

                    function getElem(elem) {
                        return document.querySelector(elem);
                    }
                        //CPF//
                    const cpf = getElem('#cpf')
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
                    const tel = getElem('#telefone')
                
                    tel.addEventListener('keypress', (e) => mascaraTel(e.target.value)) // Dispara quando digitado no campo
                    tel.addEventListener('change', (e) => mascaraTel(e.target.value)) // Dispara quando autocompletado o campo
                
                    const mascaraTel = (valor) => {
                        valor = valor.replace(/\D/g, "")
                        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
                        valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
                        tel.value = valor 
                    }

                                            //DATA NASCIMENTO//
            
                    function validadata(){
                        var data = document.getElementById("dt-nascimento").value; // pega o valor do input
                        data = data.replace(/\//g, "-"); // substitui eventuais barras (ex. IE) "/"     porhífen "-"
                        var data_array = data.split("-"); // quebra a data em array
                        // para o IE onde será inserido no formato dd/MM/yyyy
                        if(data_array[0].length != 4){
                           data = data_array[2]+"-"+data_array[1]+"-"+data_array[0];
                        }

                        // comparo as datas e calculo a idade
                        var hoje = new Date();
                        var nasc  = new Date(data);
                        var idade = hoje.getFullYear() - nasc.getFullYear();
                        var m = hoje.getMonth() - nasc.getMonth();
                        if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;

                        if(idade < 18){
                            getElem("#aviso-data").style.display = "block";
                            data = null;
                            return false;
                        };

                        getElem("#aviso-data").style.display = "none";
                    }      
                </script>   
                
                <button type="submit" class="btn btn-success" onclick='return validadata()'>Salvar</button>
            </form>
        </div>    
    </div>
@endsection() 