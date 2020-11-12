<!--//'nome', 'sobrenome', 'cpf', 'dt_nascimento', 'senha',-->
<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome ?? ''}}" required>
</div>
<div class="form-group">
    <label for="sobrenome">Sobrenome</label>
    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{$cliente->sobrenome ?? ''}}" required>
</div>
<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$cliente->cpf ?? ''}}" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
</div>

<div class="form-group">
    <label for="dt_nascimento">Data de Nascimento</label>
    <input type="date" class="form-control" id="dt-nascimento" name="dt_nascimento" value="{{$cliente->dt_nascimento ?? ''}}" required>
    <div class="alert alert-warning" id="aviso-data" style="display:none;" role="alert">
        Desculpe, pessoas com menos de 18 anos não podem se cadastrar.
    </div>
</div>

@if (!isset($contatos))
    
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required>
    </div>

@endif
<div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" minlength="8"  value="{{$cliente->senha ?? ''}}" required>
</div>




<script>

    function getElem(elem) {
        return document.querySelector(elem);
    }

        //CPF//
    const cpf = getElem('#cpf')//retorna o valor do input
    cpf.addEventListener('keypress', (e) => mascaraCPF(e.target.value))// Dispara quando digitado no campo
    cpf.addEventListener('change', (e) => mascaraCPF(e.target.value)) // Dispara quando autocompletado o campo
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
        data = data.replace(/\//g, "-"); // substitui eventuais barras
        var data_array = data.split("-"); // quebra a data em array
    
        if(data_array[0].length != 4){
           data = data_array[2]+"-"+data_array[1]+"-"+data_array[0];
        }

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