<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'App\Http\Controllers\CardapioController@index')->name('cardapio.index.json');
Route::post('/cadastro', 'App\Http\Controllers\CardapioController@store');

// Rotas para visualização, edição e exclusão de registros
Route::get('/exibir/{id}', 'App\Http\Controllers\CardapioController@show');
Route::patch('/editar/{id}', 'App\Http\Controllers\CardapioController@edit');
Route::put('/atualizar/{id}', 'App\Http\Controllers\CardapioController@update');
Route::delete('/deletar/{id}', 'App\Http\Controllers\CardapioController@destroy');
