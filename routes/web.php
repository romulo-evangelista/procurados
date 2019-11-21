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
Route::get('/procuracao', 'DocumentoController@index')->name('documento.index');

// Outorgados
Route::get('/outorgados', 'OutorgadoController@index')->name('outorgado.index');
Route::get('/new/outorgado', 'OutorgadoController@create')->name('outorgado.create');
Route::post('/new/outorgado', 'OutorgadoController@store')->name('outorgado.store');
Route::get('/edit/outorgado', 'OutorgadoController@edit')->name('outorgado.edit');
Route::post('/destroy/outorgado', 'OutorgadoController@destroy')->name('outorgado.destroy');

// Outorgantes
Route::get('/new/outorgante', 'OutorganteController@create')->name('outorgante.create');
Route::post('/new/outorgante', 'OutorganteController@store')->name('outorgante.store');
