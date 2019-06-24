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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rotas para a tabela de funcionario

Route::get('/funcionario','FuncionarioController@index')->name('funcionario.index');
Route::get('/funcionario/create','FuncionarioController@create')->name('funcionario.create');
Route::post('/funcionario','FuncionarioController@store')->name('funcionario.store');
Route::get('/funcionario/{id}','FuncionarioController@show')->name('funcionario.show');
Route::get('/funcionario/{id}/edit','FuncionarioController@edit')->name('funcionario.edit');
Route::put('/funcionario/{id}','FuncionarioController@update')->name('funcionario.update');
Route::get('/funcionario/{id}/delete','FuncionarioController@destroy')->name('funcionario.destroy');

//Rotas para a tabela de fornecedores
Route::get('/fornecedor','FornecedorController@index')->name('fornecedor.index');
Route::get('/fornecedor/create','FornecedorController@create')->name('fornecedor.create');
Route::post('/fornecedor','FornecedorController@store')->name('fornecedor.store');
Route::get('/fornecedor/{id}','FornecedorController@show')->name('fornecedor.show');
Route::get('/fornecedor/{id}/edit','FornecedorController@edit')->name('fornecedor.edit');
Route::put('/fornecedor/{id}','FornecedorController@update')->name('fornecedor.update');
Route::get('/fornecedor/{id}/delete','FornecedorController@destroy')->name('fornecedor.destroy');

//Rotas para a tabela de vendas
Route::get('/venda','VendaController@index')->name('venda.index');
Route::get('/venda/create','VendaController@create')->name('venda.create');
Route::post('/venda','VendaController@store')->name('venda.store');
Route::get('/venda/{id}','VendaController@show')->name('venda.show');
Route::get('/venda/{id}/edit','VendaController@edit')->name('venda.edit');
Route::put('/venda/{id}','VendaController@update')->name('venda.update');
Route::get('/venda/{id}/delete','VendaController@destroy')->name('venda.destroy');

//Rotas para a tabela de Itens
Route::get('/item','ItemController@index')->name('item.index');
Route::get('/item/create','ItemController@create')->name('item.create');
Route::post('/item','ItemController@store')->name('item.store');
Route::get('/item/{id}','ItemController@show')->name('item.show');
Route::get('/item/{id}/edit','ItemController@edit')->name('item.edit');
Route::post('/item/{id}','ItemController@update')->name('item.update');
Route::get('/item/{id}/delete','ItemController@destroy')->name('item.destroy');