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

Route::get('/produtos/listar', 'Api\ProdutoController@listar');
Route::post('/produtos/salvar', 'Api\ProdutoController@salvar');
Route::get('/produtos/buscar/{id}', 'Api\ProdutoController@buscar');
Route::put('/produtos/atualizar/{id}', 'Api\ProdutoController@atualizar');
Route::delete('/produtos/deletar/{id}', 'Api\ProdutoController@deletar');
Route::get ('/estoque/buscar/{id}','Api\EstoqueController@verificar');
Route::post ('/estoque/salvar/','Api\EstoqueController@salvar');
Route::put ('/estoque/atualizar/{id}','Api\EstoqueController@atualizar');
Route::delete ('/estoque/deletar/{id}','Api\EstoqueController@deletar');

//Rotas de Categoria
Route::get('/categoria/listar', 'Api\CategoriaController@listar');
Route::post('/categoria/salvar', 'Api\CategoriaController@salvar');
Route::delete('/categoria/deletar/{id}','Api\CategoriaController@deletar');
Route::get('/categoria/buscar/{id}', 'Api\CategoriaController@buscar');
Route::get('/categoria/buscaTermo', 'Api\CategoriaController@buscaTermo');