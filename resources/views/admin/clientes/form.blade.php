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
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$cliente->cpf ?? ''}}">
</div>
<div class="form-group">
    <label for="dt_nascimento">Data de Nascimento</label>
    <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="{{$cliente->dt_nascimento ?? ''}}">
</div>
<div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" value="{{$cliente->senha ?? ''}}">
</div>