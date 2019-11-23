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
Route::get('/procuracao', 'DocumentoController@index')->name('documentos.index');

// Outorgados
Route::resource('outorgados', 'OutorgadoController');

// Outorgantes
Route::resource('outorgantes', 'OutorganteController');
