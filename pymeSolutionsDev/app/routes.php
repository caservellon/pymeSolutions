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
Route::get('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));

Route::get('editarParametrizar', 'CotizacionsController@editarParametrizar');
Route::resource('Cotizacions', 'CotizacionsController');

