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

Route::resource('AperturaCajas', 'AperturacajasController');

Route::resource('Ventas', 'VentasController');

Route::resource('DetalleDeVenta', 'DetalleDeVentaController');

Route::resource('FormaPagos', 'FormaPagosController');

Route::resource('EstadoBonos', 'EstadobonosController');

Route::resource('BonoDeCompras', 'BonodecomprasController');

Route::resource('Devoluciones', 'DevolucionesController');

Route::resource('DetalleDevoluciones', 'DetalleDevolucionesController');