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

Route::get('Cotizacions/parametrizar', array('as'=>'parametrizar', 'uses'=> 'CotizacionsController@parametrizar'));

//Route::get('parametrizar', 'CotizacionsController@parametrizar');
Route::post('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));

Route::get('Cotizacions/editarParametrizar', array('as'=>'editarParametrizar', 'uses'=>'CotizacionsController@editarParametrizar'));
Route::get('Cotizacions/actualizar', array('as'=>'actualizar', 'uses'=>'CotizacionsController@actualizar'));
Route::resource('Cotizacions', 'CotizacionsController');

