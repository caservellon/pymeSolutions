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

Route::get('/', function(){
	return View::make('hello');
});

Route::get('/Compras/Parametrizar/SolicitudCotizacion', array(
	'as' => 'ParametrizarSolicitudCotizacion',
	function(){
		return View::make('COM_SolicitudCotizacion.ParametrizarSolicitudCotizacion');
	}
));

Route::post('/Compras/Parametrizar/SolicitudCotizacion', 'SolicitudCotizacionController@NuevoCampoLocal');