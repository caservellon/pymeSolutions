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

Route::resource('contabilidad/configuracion/unidadmonetaria', 'UnidadMonetariaController');
Route::resource('contabilidad/configuracion/periodocontable', 'ParamPeriodoContableController');
Route::resource('clasificacion-cuentas','ClasificacionCuentaController');
Route::resource('catalogo-contable', 'CatalogoContablesController');
Route::resource('contabilidad/motivotransaccion', 'MotivoTransaccionsController');
Route::resource('librodiarios', 'LibroDiarioController');


Route::get('catalogo-contable/cambiarestado', array('uses'=>'CatalogoContablesController@cambiarestado'));
Route::get('contabilidad',array('uses' => 'ContabilidadController@index'));
Route::get('contabilidad/configuracion',array('uses' => 'ContabilidadController@config'));
Route::get('contabilidad/configuracion/unidadmonetaria',array('uses' => 'UnidadMonetariaController@index'));
Route::get('contabilidad/configuracion/periodocontable',array('as'=>'periodocontable', 'uses' => 'ParamPeriodoContableController@index'));
Route::get('contabilidad/configuracion/catalogocuentas',array('uses' => 'CatalogoContablesController@index'));

Route::get('contabilidad/librodiario',array('uses' => 'LibroDiarioController@index', ));
Route::get('contabilidad/configuracion/subcuentas',array ('uses' => 'SubcuentaController@index'));


Route::resource('subcuenta', 'SubcuentaController');
Route::get('contabilidad/librodiario',array('uses' => 'LibroDiarioController@index'));
Route::post('contabilidad/librodiario', array('uses'=>'LibroDiarioController@index'));
Route::get('contabilidad/motivotransaccion',array('uses' => 'MotivoTransaccionsController@index'));


Route::resource('detalleasientos', 'DetalleAsientosController');
Route::resource('cuentamotivos', 'CuentaMotivosController');
