<!--protected $fillable = [
        'nr_pedido', 'dt_pedido',
    ];-->

<div class="form-group">
    <label for="nr_pedido">Número do Pedido</label>
<input type="text" class="form-control" id="nr_pedido" name="nr_pedido" value="{{$pedido->nr_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="dt_pedido">Data de criação do pedido</label>
    <input type="text" class="form-control" id="dt_pedido" name="dt_pedido" value="{{$pedido->dt_pedido ?? ''}}">
</div>
