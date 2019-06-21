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

//Rotas para as tabelas

Route::get('/funcionario','FuncionarioController@index')->name('funcionario.index');
Route::get('/funcionario/create','FuncionarioController@create')->name('funcionario.create');
Route::post('/funcionario','FuncionarioController@store')->name('funcionario.store');
Route::get('/funcionario/{id}','FuncionarioController@show')->name('funcionario.show');
Route::get('/funcionario/{id}/edit','FuncionarioController@edit')->name('funcionario.edit');
Route::put('/funcionario/{id}','FuncionarioController@update')->name('funcionario.update');
Route::get('/funcionario/{id}/delete','FuncionarioController@destroy')->name('funcionario.destroy');


