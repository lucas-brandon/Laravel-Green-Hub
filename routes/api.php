<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Produto
Route::get('/produtos/listar', 'Api\ProdutoController@listar');
Route::post('/produtos/salvar', 'Api\ProdutoController@salvar');
Route::get('/produtos/buscar/{id}', 'Api\ProdutoController@buscar');
Route::get('/produtos/buscarNome/{id}', 'Api\ProdutoController@buscarNome');
Route::put('/produtos/atualizar/{id}', 'Api\ProdutoController@atualizar');
Route::delete('/produtos/deletar/{id}', 'Api\ProdutoController@deletar');

//Endereço
Route::get('/endereco/listar', 'Api\EnderecoController@listar');
Route::get ('/endereco/buscar/{id}','Api\EnderecoController@buscar');
Route::post ('/endereco/salvar/','Api\EnderecoController@salvar');
Route::put ('/endereco/atualizar/{id}','Api\EnderecoController@atualizar');
Route::delete ('/endereco/deletar/{id}','Api\EnderecoController@deletar');

//Endereco Cliente
Route::get('/enderecoCliente/listar', 'Api\EnderecoClienteController@listar');
Route::get ('/enderecoCliente/buscar/{id}','Api\EnderecoClienteController@buscar');
Route::post ('/enderecoCliente/salvar/','Api\EnderecoClienteController@salvar');
Route::put ('/enderecoCliente/atualizar/{id}','Api\EnderecoClienteController@atualizar');
Route::delete ('/enderecoCliente/deletar/{id}','Api\EnderecoClienteController@deletar');

//Contato
Route::get('/contato/listar', 'Api\ContatoController@listar');
Route::get ('/contato/buscar/{id}','Api\ContatoController@buscar');
Route::get('/contato/buscarEmail/{contato}', 'Api\ContatoController@buscarEmail');
Route::post ('/contato/salvar/','Api\ContatoController@salvar');
Route::put ('/contato/atualizar/{id}','Api\ContatoController@atualizar');
Route::delete ('/contato/deletar/{id}','Api\ContatoController@deletar');

//Categoria
Route::get('/categoria/listar', 'Api\CategoriaController@listar');
Route::get('/categoria/buscar/{id}', 'Api\CategoriaController@buscar');
Route::post('/categoria/salvar', 'Api\CategoriaController@salvar');
Route::put('/categoria/atualizar/{id}', 'Api\CategoriaController@atualizar');
Route::delete('/categoria/deletar/{id}','Api\CategoriaController@deletar');
Route::get('/categoria/buscarProdutos/{id}', 'Api\CategoriaController@buscarProdutos');

//Status Pedido
Route::get ('/status_pedido/listar/','Api\StatusPedidoController@listar');
Route::get ('/status_pedido/buscar/{id}','Api\StatusPedidoController@buscar');
Route::post ('/status_pedido/salvar/','Api\StatusPedidoController@salvar');
Route::put ('/status_pedido/atualizar/{id}','Api\StatusPedidoController@atualizar');
Route::delete ('/status_pedido/deletar/{id}','Api\StatusPedidoController@deletar');

//Fornecedores
Route::get('/fornecedores/listar', 'Api\FornecedorController@listar');
Route::post('/fornecedores/salvar', 'Api\FornecedorController@salvar');
Route::get('/fornecedores/buscar/{id}', 'Api\FornecedorController@buscar');
Route::put('/fornecedores/atualizar/{id}', 'Api\FornecedorController@atualizar');
Route::delete('/fornecedores/deletar/{id}', 'Api\FornecedorController@deletar');

//Forma de Pagamento
Route::get('/pagamento/listar', 'Api\PagamentoController@listar');
Route::post('/pagamento/salvar', 'Api\PagamentoController@salvar');
Route::get('/pagamento/buscar/{id}', 'Api\PagamentoController@buscar');
Route::put('/pagamento/atualizar/{id}', 'Api\PagamentoController@atualizar');
Route::delete('/pagamento/deletar/{id}', 'Api\PagamentoController@deletar');

//Tipo de Contatos
Route::get('/tipoContatos/listar', 'Api\TipoContatoController@listar');
Route::post('/tipoContatos/salvar', 'Api\TipoContatoController@salvar');
Route::get('/tipoContatos/buscar/{id}', 'Api\TipoContatoController@buscar');
Route::put('/tipoContatos/atualizar/{id}', 'Api\TipoContatoController@atualizar');
Route::delete('/tipoContatos/deletar/{id}', 'Api\TipoContatoController@deletar');

//Cliente
Route::get('/clientes/listar', 'Api\ClienteController@listar');
Route::post('/clientes/salvar', 'Api\ClienteController@salvar');
Route::get('/clientes/logar/{senha}/{email}', 'Api\ClienteController@logar');
Route::get('/clientes/buscar/{id}', 'Api\ClienteController@buscar');
Route::get('/clientes/logar/{senha}/{email}', 'Api\ClienteController@logar');
Route::get('/clientes/buscarSenha/{senha}', 'Api\ClienteController@buscarSenha');
Route::get('/clientes/buscarNome/{nome}', 'Api\ClienteController@buscarNome');
Route::put('/clientes/atualizar/{id}', 'Api\ClienteController@atualizar');
Route::delete('/clientes/deletar/{id}', 'Api\ClienteController@deletar');


//Pedido
Route::post('/pedidos/salvar/','Api\PedidoController@cadastro');
Route::get('/pedidos/listar/','Api\PedidoController@listar');
Route::get('/pedidos/listarProdutos/{id}','Api\PedidoController@listarProdutos');
Route::delete('/pedidos/deletar/{id}','Api\PedidoController@deletar');

//Pedido Item
Route::get('/pedidoItens/listar/','Api\PedidoItemController@listar');
Route::delete('/pedidoItens/deletar/','Api\PedidoItemController@deletar');

//Estoque
Route::get('/estoque/listar/','Api\EstoqueController@listar');

//Imagem
Route::post('imagens/salvar/', 'Api\ImagemProdutoController@salvar');

//Cartão Cliente
Route::get('/cartao/listar', 'Api\CartaoClienteController@listar');
Route::post('/cartao/salvar', 'Api\CartaoClienteController@salvar');
Route::post('/cartao/cadastrar/{id}', 'Api\CartaoClienteController@cadastrar');
Route::get('/cartao/buscar/{id}', 'Api\CartaoClienteController@buscar');
Route::put('/cartao/atualizar/{id}', 'Api\CartaoClienteController@atualizar');
Route::delete('/cartao/deletar/{id}', 'Api\CartaoClienteController@deletar');


