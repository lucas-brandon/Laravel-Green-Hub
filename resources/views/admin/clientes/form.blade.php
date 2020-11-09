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