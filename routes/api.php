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

Route::get ('/estoque/buscar/{id}','Api\EstoqueController@verificar');
Route::post ('/estoque/salvar/','Api\EstoqueController@salvar');
Route::put ('/estoque/atualizar/{id}','Api\EstoqueController@atualizar');
Route::delete ('/estoque/deletar/{id}','Api\EstoqueController@deletar');