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

@if (!isset($contatos))
    
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone">
    </div>
{{--
@else
    @foreach ($contatos as $contato)
        @if ($contato->tipo_contato_id == 1)
            <div class="form-group">
                <label for="email">Contato</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$contato->ds_contato ?? ''}}">
            </div>
        @elseif ($contato->tipo_contato_id == 2)
            <div class="form-group">
                <label for="telefone">Contato</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$contato->ds_contato ?? ''}}">
            </div>
        @endif
    @endforeach
--}}
@endif
<div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" value="{{$cliente->senha ?? ''}}">
</div>