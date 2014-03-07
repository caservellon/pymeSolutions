<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('unidad-monetaria', 'UnidadMonetariaController');
Route::resource('param-periodo', 'ParamPeriodoContableController');
Route::resource('clasificacion-cuentas','ClasificacionCuentaController');
Route::resource('catalogo-contable', 'CatalogoContablesController');


Route::get('catalogo-contable/cambiarestado', array('uses'=>'CatalogoContablesController@cambiarestado'));