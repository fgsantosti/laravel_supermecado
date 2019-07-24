<?php

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

Route::get('/', function () {
    return view('welcome');
});

//incluindo todas as rotas da class CategoriaController
Route::resource('categorias', 'CategoriaController');
//incluindo todas as rotas da class ProdutoController
Route::resource('produtos', 'ProdutoController');

//rota para funcao que retornar nomes da categoria
//Route::get('produtos', 'ProdutoController@nome_categoria');

