<!--'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra',-->

<div class="form-group">
    <label for="nome_produto">Nome</label>
    <input type="text" class="form-control" id="nome_produto" name="nome_produto"
    value="{{ $produto->nome_produto ?? '' }}">
</div>
<div class="form-group">
    <label for="ds_produto">Descrição</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{ $produto->ds_produto ?? '' }}">
</div>
<div class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control" id="ds_categoria" name="ds_categoria">
        @foreach ($categorias as $categoria)
            <option>{{ $categoria->descricao }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="nm_marca">Marca</label>
    <input type="text" class="form-control" id="nm_marca" name="nm_marca" value="{{ $produto->nm_marca ?? '' }}">
</div>
<div class="form-group">
    <label for="valor">Preço (R$)</label>
    <input type="number" class="form-control" id="valor" name="valor" value="{{ $preco->valor ?? '' }}">
</div>
<div class="form-group">
    <label for="desconto">Desconto (%)</label>
    <input type="number" class="form-control" id="desconto" name="desconto" value="{{ $preco->desconto ?? '' }}">
</div>
<div class="form-group">
    <label for="dt_vigencia_ini">Data de vigência inicial do preço</label>
    <input type="date" class="form-control" step="any" id="dt_vigencia_ini" name="dt_vigencia_ini"
    value="{{ $preco->dt_vigencia_ini ?? '' }}">
</div>
<div class="form-group">
    <label for="dt_vigencia_fim">Data de vigência final do preço</label>
    <input type="date" class="form-control" id="dt_vigencia_fim" name="dt_vigencia_fim"
    value="{{ $preco->dt_vigencia_fim ?? '' }}">
</div>
<div class="form-group">
    <div class="form-check form-check-inline">
        <input type="checkbox" class="form-check-input" id="fl_promocao" name="fl_promocao">
        <label class="form-check-label" for="fl_promocao">Promoção com desconto ativa?</label>
    </div>
</div>
<div class="form-group">
    <label for="cd_barra">Código de Barra</label>
    <input type="text" class="form-control" id="cd_barra" name="cd_barra" value="{{ $produto->cd_barra ?? '' }}">
</div>

<div class="form-group">

    <label for="estoques">Quantidade</label>
  
    @if(Isset($produto))
      @foreach ($estoques as $estoque)
            @if ($estoque->produto_id == $produto->id)
                <input type="number" class="form-control" id="qtd_item" name="qtd_item"
                value="{{ $estoque->qtd_item ?? '' }}">
            @endif
        @endforeach
    @else 
    <input type="number" class="form-control" id="qtd_item" name="qtd_item"
    value="">  
    @endif
</div>
<!----><!----><!----><!---->
<div class="form-group">
    <label for="imagemProduto">Imagem</label>
    <input type="text" class="form-control" id="imagem" name="imagem">
    @if(isset($imagens->link_imagem))
        <div class="form-group">
            <img width="120" src="{{$imagens->link_imagem}}" />
        </div>
    @endif  
</div>