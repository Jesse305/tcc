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
    return view('index');
});

Route::get('/usuario_criado', function(){
  return view('mails.usuario_criado');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users.listar', 'UserController@listar')->name('users.listar');
Route::get('/users.cadastro', 'UserController@cadastro')->name('users.cadastro');
Route::post('/users.cadastrar', 'UserController@cadastrar')->name('users.cadastrar');
Route::get('/users.excluir/{user}', 'UserController@excluir')->name('users.excluir');
