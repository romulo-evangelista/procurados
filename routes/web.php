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
})->name('index');

// Procuração / Documento
Route::get('/procuracao', 'DocumentoController@index')->name('procuracao.index');
Route::post('/documento', 'DocumentoController@documento')->name('documento');

// Outorgados
Route::resource('outorgados', 'OutorgadoController');

// Outorgantes
Route::resource('outorgantes', 'OutorganteController');

// Tipos Juridicos
Route::resource('tiposJuridicos', 'TiposJuridicosController');

// Operações
Route::resource('operacoes', 'OperacaoController');
