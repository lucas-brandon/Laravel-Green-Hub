<!--'nome_produto', 'ds_produto', 'nm_marca', 'cd_barra',-->

<div class="form-group">
    <label for="nome_produto">Nome</label>
    <input type="text" class="form-control" id="nome_produto" name="nome_produto"
    value="{{ $produto->nome_produto ?? '' }}" required>
</div>
<div class="form-group">
    <label for="ds_produto">Descrição</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{ $produto->ds_produto ?? '' }}" required>
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
    <input type="text" class="form-control" id="nm_marca" name="nm_marca" value="{{ $produto->nm_marca ?? '' }}" required>
</div>
<div class="form-group">
    <label for="valor">Preço (R$)</label>
    <input type="number" class="form-control" id="valor" name="valor" value="{{ $preco->valor ?? '' }}" step="any" min="0" required>
</div>
<div class="form-group">
    <label for="desconto">Desconto (%)</label>
    <input type="number" class="form-control" id="desconto" name="desconto" value="{{ $preco->desconto ?? '' }}" min="0" max="100" required>
</div>
<div class="form-group">
    <label for="dt_vigencia_ini">Data de vigência inicial do preço</label>
    <input type="date" class="form-control" step="any" id="dt_vigencia_ini" name="dt_vigencia_ini"
    value="{{ $preco->dt_vigencia_ini ?? '' }}" required>
</div>
<div class="form-group">
    <label for="dt_vigencia_fim">Data de vigência final do preço</label>
    <input type="date" class="form-control" id="dt_vigencia_fim" name="dt_vigencia_fim"
    value="{{ $preco->dt_vigencia_fim ?? '' }}" required>
    <div class="alert alert-warning" id="aviso-data" style="display:none;" role="alert">
        Desculpe, a data de vigência final deve ser maior que a inicial.
    </div>
</div>
<div class="form-group">
    <div class="form-check form-check-inline">
        <input type="checkbox" class="form-check-input" id="fl_promocao" name="fl_promocao">
        <label class="form-check-label" for="fl_promocao">Promoção com desconto ativa?</label>
    </div>
</div>

<div class="form-group">
    <label for="cd_barra">Código de Barra</label>
    <input type="text" class="form-control" id="cd_barra" name="cd_barra" value="{{ $produto->cd_barra ?? '' }}" required>
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
    value="" min="0" max="100" maxlength="3">  
    @endif
</div>
<!----><!----><!----><!---->
<div class="form-group">
    <label for="imagemProduto">Imagem</label>
    <input type="text" class="form-control" id="imagem" name="imagem" required>
    @if(isset($imagens->link_imagem))
        <div class="form-group">
            <img width="120" src="{{$imagens->link_imagem}}" />
        </div>
    @endif  
</div>


<script>

    function getElem(elem) {
        return document.querySelector(elem);
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

                                    //DATAS DE VIGÊNCIA//

    function compararData() {

        let dataI = document.getElementById("dt_vigencia_ini").value;
        let dataF = document.getElementById("dt_vigencia_fim").value;
            
        dataI = dataI.replace(/\//g, "-");
        dataF = dataF.replace(/\//g, "-");
            
        let dataIni_array = dataI.split("-"); 
        let dataFim_array = dataF.split("-");
            
        if(dataIni_array[0].length != 4){
            dataI = dataIni_array[2]+"-"+dataIni_array[1]+"-" + dataIni_array[0];
        }

        if (dataFim_array[0].length != 4){
            dataFim = dataFim_array[2] + "-" + dataFim_array[1] + "-" + dataFim_array[0];
        }

        let dataInicial  = new Date(dataI);
        let dataFinal = new Date(dataF);

        if (dataFinal < dataInicial) {
            getElem("#aviso-data").style.display = "block";
            dataInicial = null;
            dataFinal = null;
            return false;
        }
        
        getElem("#aviso-data").style.display = "none";
    }        
</script>