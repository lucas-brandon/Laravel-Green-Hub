<!--'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra',-->

<div class="form-group">
    <label for="nome_produto">Nome</label>
<input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{$produto->nome_produto ?? ''}}">
</div>
<div class="form-group">
    <label for="ds_produto">Descrição</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{$produto->ds_produto ?? ''}}">
</div>
<div class="form-group">
    <label for="nm_marca">Marca</label>
    <input type="text" class="form-control" id="nm_marca" name="nm_marca" value="{{$produto->nm_marca ?? ''}}">
</div>
<div class="form-group">
    <label for="cd_barra">Código de Barra</label>
    <input type="text" class="form-control" id="cd_barra" name="cd_barra" value="{{$produto->cd_barra ?? ''}}">
</div>