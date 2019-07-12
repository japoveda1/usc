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

/****************** AGENDA MEDIATICA *********************/

//RUTA DE LOS FORMULARIOS PARA EL REPORTE
Route::get('/reporte-prensa-inter/{id}', 'RptPrensaInterController@index')->name('consulta-prensa-inter');
Route::get('/reporte-prensa-nac/{id}', 'RptPrensaNacController@index')->name('consulta-prensa-nac');
Route::get('/reporte-prensa-reg/{id}', 'RptPrensaRegController@index')->name('consulta-prensa-reg');
Route::get('/reporte-tv-nac/{id}', 'RptTvNacionalController@index')->name('consulta-tv-nac');
Route::get('/reporte-tv-reg/{id}', 'RptTvRegionalController@index')->name('consulta-tv-reg');

//RUTA PARA LA CONSULTA
Route::get('/consultarPrensaInter', 'RptPrensaInterController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarPrensaNac', 'RptPrensaNacController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarPrensaReg', 'RptPrensaRegController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarTvNac', 'RptTvNacionalController@consultar')->name('reporte-prensa-inter');
Route::get('/consultarTvReg', 'RptTvRegionalController@consultar')->name('reporte-prensa-inter');


//RUTAS PARA LOS FORMULARIOS PARA ANALISIS
Route::resource('prensa-internacional', 'PrensaInternacionalController');
Route::resource('prensa-regional', 'PrensaRegionalController');
Route::resource('prensa-nacional', 'PrensaNacionalController');
Route::resource('television-regional', 'TvRegionalController');
Route::resource('television-nacional', 'TvNacionalController');


/****************** SEGUIMIENTO ELECTORAL *********************/

//RUTAS PARA LOS FORMULARIOS PARA ANALISIS

Route::resource('se-television-regional', 'SETvRegionalController');
//Route::resource('se-television-nacional', 'SETvNacionalController');
Route::resource('se-digital-regional', 'SEDigitalRegionalController');
Route::resource('se-digital-nacional', 'SEDigitalNacionalController');





//RUTAS PARA LOS FORMULARIOS PARA ANALISIS
Route::get('/se-tv-nacional/{id}','SETvNacionalController@index')->name('formulario-se-tv-nacional');
Route::get('/se-tv-regional/{id}','SETvNacionalController@index')->name('formulario-se-tv-regional');
Route::get('/se-md-nacional/{id}','SETvNacionalController@index')->name('formulario-se-md-nacional');
Route::get('/se-md-regional/{id}','SETvNacionalController@index')->name('formulario-se-md-nacional');

//RUTAS PARA LOS REPORTES 
Route::get('/rpt-se-tv-nacional/{id}','RptSETvNacionalController@index')->name('consulta-se-tv-nacional');
Route::get('/rpt-se-tv-regional/{id}','SETvRegionalController@index')->name('consulta-se-tv-regional');
Route::get('/rpt-se-md-nacional/{id}','SEDigitalNacionalController@index')->name('consulta-se-md-nacional');
Route::get('/rpt-se-md-nacional/{id}','SEDigitalNacionalController@index')->name('consulta-se-md-nacional');

//RUTAS PARA LAS CONSULTAS
Route::get('/consultarSETvInter', 'RptSETvNacionalController@consultar')->name('reporte-prensa-inter');

//Funciones
Route::get('/SubGenPerio','SETvNacionalController@getSubGenPerio');
Route::post('/post-se-tv-nacional', 'SETvNacionalController@store')->name('SETvNacional.store');