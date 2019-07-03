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
    //return view('home');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/reporte-prensa-inter/{id}', 'RptPrensaInterController@index')->name('consulta-prensa-inter');
Route::get('/consultar', 'RptPrensaInterController@consultar')->name('reporte-prensa-inter');

Route::resource('prensa-internacional', 'PrensaInternacionalController');
Route::resource('prensa-regional', 'PrensaRegionalController');
Route::resource('prensa-nacional', 'PrensaNacionalController');