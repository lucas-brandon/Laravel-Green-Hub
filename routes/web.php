<?php

use Illuminate\Support\Facades\Route;

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

//-------Admin Cliente
Route::get('/admin/clientes', 'Admin\ClienteController@index')->name('admin.clientes.home');

Route::get('/admin/clientes/adicionar', 'Admin\ClienteController@adicionar')->name('admin.clientes.adicionar');

Route::post('/admin/clientes/salvar', 'Admin\ClienteController@salvar')->name('admin.clientes.salvar');

Route::get('/admin/clientes/editar/{id}', 'Admin\ClienteController@editar')->name('admin.clientes.editar');

Route::put('/admin/clientes/atualizar/{id}', 'Admin\ClienteController@atualizar')->name('admin.clientes.atualizar');

Route::delete('/admin/clientes/deletar/{id}', 'Admin\ClienteController@deletar')->name('admin.clientes.deletar');

//--------Admin Produto
Route::get('/admin/produtos', 'Admin\ProdutoController@index')->name('admin.produtos.home');

Route::get('/admin/produtos/adicionar', 'Admin\ProdutoController@adicionar')->name('admin.produtos.adicionar');

Route::post('/admin/produtos/salvar', 'Admin\ProdutoController@salvar')->name('admin.produtos.salvar');

Route::get('/admin/produtos/editar/{id}', 'Admin\ProdutoController@editar')->name('admin.produtos.editar');

Route::put('/admin/produtos/atualizar/{id}', 'Admin\ProdutoController@atualizar')->name('admin.produtos.atualizar');

Route::delete('/admin/produtos/deletar/{id}', 'Admin\ProdutoController@deletar')->name('admin.produtos.deletar');