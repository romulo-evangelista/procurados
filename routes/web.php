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

Route::get('/', 'DocumentoController@index');

Route::get('/outorgados', 'OutorgadoController@index')->name('outorgado.index');

Route::get('/new/outorgado', 'OutorgadoController@create');

Route::post('/new/outorgado', 'OutorgadoController@store');
