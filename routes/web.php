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
Route::get('/reporte-prensa-nac/{id}', 'RptPrensaNacController@index')->name('consulta-prensa-nac');
Route::get('/reporte-prensa-reg/{id}', 'RptPrensaRegController@index')->name('consulta-prensa-reg');
Route::get('/reporte-tv-nac/{id}', 'RptTvNacionalController@index')->name('consulta-tv-nac');
Route::get('/reporte-tv-reg/{id}', 'RptTvRegionalController@index')->name('consulta-tv-reg');



Route::get('/consultarPrensaInter', 'RptPrensaInterController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarPrensaNac', 'RptPrensaNacController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarPrensaReg', 'RptPrensaRegController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarTvNac', 'RptTvNacionalController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarTvReg', 'RptTvRegionalController@consultar')->name('reporte-prensa-inter');

Route::resource('prensa-internacional', 'PrensaInternacionalController');
Route::resource('prensa-regional', 'PrensaRegionalController');
Route::resource('prensa-nacional', 'PrensaNacionalController');
Route::resource('television-regional', 'TvRegionalController');
Route::resource('television-nacional', 'TvNacionalController');