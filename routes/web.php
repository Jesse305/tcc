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

// módulo usuário
Route::get('/users.listar', 'UserController@listar')->name('users.listar');
Route::get('users.veiculos/{user}', 'UserController@veiculos')->name('users.veiculos');
Route::get('/users.cadastro', 'UserController@cadastro')->name('users.cadastro');
Route::post('/users.cadastrar', 'UserController@cadastrar')->name('users.cadastrar');
Route::get('/users.edicao/{user}', 'UserController@edicao')->name('users.edicao');
Route::post('/users.editar/{user}', 'UserController@editar')->name('users.editar');
Route::post('/users.trocar_senha/{user}', 'UserController@trocarSenha')->name('users.trocar_senha');
Route::get('/users.excluir/{user}', 'UserController@excluir')->name('users.excluir');
Route::post('/users.recupera_senha', 'UserController@recuperaSenha')->name('users.recupera_senha');

// módulo veiculo
Route::get('/veiculos.listar', 'VeiculoController@listar')->name('veiculos.listar');
Route::get('/veiculos.cadastro', 'VeiculoController@cadastro')->name('veiculos.cadastro');
Route::post('/veiculos.cadastrar', 'VeiculoController@cadastrar')->name('veiculos.cadastrar');
Route::get('/veiculos.edicao/{veiculo}', 'VeiculoController@edicao')->name('veiculos.edicao');
Route::post('/veiculos.editar/{veiculo}', 'VeiculoController@editar')->name('veiculos.editar');
Route::get('/veiculos.excluir/{veiculo}', 'VeiculoController@excluir')->name('veiculos.excluir');
