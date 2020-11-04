<!--//'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',-->
<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome ?? ''}}">
</div>
<div class="form-group">
    <label for="sobrenome">Sobrenome</label>
    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{$cliente->sobrenome ?? ''}}">
</div>
<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$cliente->cpf ?? ''}}" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
</div>
<div class="form-group">
    <label for="dt_nascimento">Data de Nascimento</label>
    <input type="date" class="form-control" id="dt-nascimento" name="dt_nascimento" value="{{$cliente->dt_nascimento ?? ''}}">
</div>
@if (!isset($contatos))
    
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required>
    </div>

@endif
<div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" value="{{$cliente->senha ?? ''}}">
</div>



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
    const tel = document.getElementById('telefone') // Seletor do campo de telefone
    
    tel.addEventListener('keypress', (e) => mascTel(e.target.value)) // Dispara quando digitado no campo
    tel.addEventListener('change', (e) => mascTel(e.target.value)) // Dispara quando autocompletado o campo
    
    const mascTel = (valor) => {
        valor = valor.replace(/\D/g, "")
        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
        valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
        tel.value = valor 
    }


    function calculaIdade(dataNasc){ 
         var dataAtual = new Date();
         console.log(dataAtual);
         var anoAtual = dataAtual.getFullYear();
         console.log(anoAtual);
         var anoNascParts = dataNasc.split('/');
         var diaNasc =anoNascParts[0];
         var mesNasc =anoNascParts[1];
         var anoNasc =anoNascParts[2];
         var idade = anoAtual - anoNasc;
         var mesAtual = dataAtual.getMonth() + 1; 
         //Se mes atual for menor que o nascimento, nao fez aniversario ainda;  
         if(mesAtual < mesNasc){
            idade--; 
         } else {
            //Se estiver no mes do nascimento, verificar o dia
            if(mesAtual == mesNasc){ 
                if(new Date().getDate() < diaNasc ){ 
                    //Se a data atual for menor que o dia de nascimento ele ainda nao fez aniversario
                    idade--; 
                }
            }
         } 
        return idade; 
    }

    let teste = document.getElementById('dt-nascimento');
    teste.toString();
    console.log(teste);
console.log(calculaIdade(teste));
</script>