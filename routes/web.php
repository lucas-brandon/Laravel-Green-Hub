<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/home', 'Admin\ClienteController@index')->name('admin.home');
//Route::get('/', 'Admin\ClienteController@index')->name('home');

Route::group(['middleware'=>'auth'], function (){

    Route::get('/home', 'Admin\ClienteController@index')->name('admin.home');
    Route::get('/', 'Admin\ClienteController@index')->name('home');

    //-------Admin Cliente
    Route::get('/admin/clientes', 'Admin\ClienteController@index')->name('admin.clientes.index');

    Route::get('/admin/clientes/adicionar', 'Admin\ClienteController@adicionar')->name('admin.clientes.adicionar');

    Route::post('/admin/clientes/salvar', 'Admin\ClienteController@salvar')->name('admin.clientes.salvar');

    Route::get('/admin/clientes/editar/{id}', 'Admin\ClienteController@editar')->name('admin.clientes.editar');

    Route::put('/admin/clientes/atualizar/{id}', 'Admin\ClienteController@atualizar')->name('admin.clientes.atualizar');

    Route::delete('/admin/clientes/deletar/{id}', 'Admin\ClienteController@deletar')->name('admin.clientes.deletar');

    //--------Admin Produto
    Route::get('/admin/produtos', 'Admin\ProdutoController@index')->name('admin.produtos.index');

    Route::get('/admin/produtos/adicionar', 'Admin\ProdutoController@adicionar')->name('admin.produtos.adicionar');

    Route::post('/admin/produtos/salvar', 'Admin\ProdutoController@salvar')->name('admin.produtos.salvar');

    Route::get('/admin/produtos/editar/{id}', 'Admin\ProdutoController@editar')->name('admin.produtos.editar');

    Route::put('/admin/produtos/atualizar/{id}', 'Admin\ProdutoController@atualizar')->name('admin.produtos.atualizar');

    Route::delete('/admin/produtos/deletar/{id}', 'Admin\ProdutoController@deletar')->name('admin.produtos.deletar');

    //--------Admin Pedido
    Route::get('/admin/pedidos', 'Admin\PedidoController@index')->name('admin.pedidos.index');

    Route::get('/admin/pedidos/adicionar', 'Admin\PedidoController@adicionar')->name('admin.pedidos.adicionar');

    Route::post('/admin/pedidos/salvar', 'Admin\PedidoController@salvar')->name('admin.pedidos.salvar');

    Route::get('/admin/pedidos/editar/{id}', 'Admin\PedidoController@editar')->name('admin.pedidos.editar');

    Route::put('/admin/pedidos/atualizar/{id}', 'Admin\PedidoController@atualizar')->name('admin.pedidos.atualizar');

    Route::delete('/admin/pedidos/deletar/{id}', 'Admin\PedidoController@deletar')->name('admin.pedidos.deletar');
});

Route::get('/pedido/{id}', 'PedidoController@index');
Route::post('/pedido', 'PedidoController@criar');
Route::put('/pedido', 'PedidoController@editar');

//Route::get('/home', 'Admin\HomeController@index')->name('home');
Auth::routes();

//Route::get('/home', 'Admin\HomeController@index')->name('home');
//Route::get('/home', 'Admin\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');