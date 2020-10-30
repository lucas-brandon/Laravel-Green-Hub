<!--

'cliente_id', 'status_pedido_id', 'pagamento_id', 'nr_pedido', 'dt_pedido',

-->
<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">      
      @foreach ($statusPedidos as $status)
        @if (isset($pedido->status_pedido_id) && $pedido->status_pedido_id == $status->id)
            <option selected>{{$status->ds_status}}</option>
        @else
            <option>{{$status->ds_status}}</option>
        @endif
      @endforeach
    </select>
</div>
<div class="form-group">
    <label for="cliente_nome">Cliente</label>
    <select class="form-control" id="cliente_nome" name="cliente_nome">      
      @foreach ($clientes as $cliente)
        @if (isset($pedido->cliente_id) && $pedido->cliente_id == $cliente->id)
            <option selected>{{$cliente->nome}}</option>
        @else
            <option>{{$cliente->nome}}</option>
        @endif
      @endforeach
    </select>
</div>
<div class="form-group">
    <label for="nr_pedido">Número do Pedido</label>
<input type="number" class="form-control" id="nr_pedido" name="nr_pedido" value="{{$pedido->nr_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="dt_pedido">Data de criação do pedido</label>
    <input type="date" class="form-control" id="dt_pedido" name="dt_pedido" value="{{$pedido->dt_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="valor">Valor total</label>
    <input type="number" class="form-control" type="any" id="valor" name="valor" value="{{$pedido->valor ?? ''}}">
</div>
