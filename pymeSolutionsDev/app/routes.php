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
<<<<<<< HEAD
});    
//crea un nuevo estado de orden de compras
Route::get('/Compras/Configuracion/EstadoOrden/Nuevo',array('as'=>'NuevoEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@NuevoEstadoOrden'));
Route::post('/Compras/Configuracion/EstadoOrden/Nuevo',array('as'=>'AlmacenaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@AlmacenaEstadoOrden'));

//edita un estado de orden de compras ya existente
Route::get('/Compras/Configuracion/EstadoOrden/Lista',array('as'=>'index','uses'=>'COMEstadoOrdenCompraController@index'));
Route::get('/Compras/Configuracion/EstadoOrden/Editar',array('as'=>'EditarEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@edit'));
Route::patch('/Compras/Configuracion/EstadoOrden/Editar',array('as'=>'ActualizaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@update'));

//crea una nueva transicion de estado de orden de compras
Route::get('/Compras/Configuracion/TransicionEstado/ListaEstados', array('as'=>'ListaEstadoTransicion','uses'=>'COMTransicionEstadoController@ListaEstados'));
Route::get('/Compras/Configuracion/TransicionEstado/Nueva',array('as'=>'NuevaTransicion','uses'=>'COMTransicionEstadoController@NuevaTransicionEstado'));
Route::post('/Compras/Configuracion/TransicionEstado/Nueva',array('as'=>'AlmacenaTransicion', 'uses'=>'COMTransicionEstadoController@AlmacenaTransicion'));

//edita una transicion de estado de orden de compras ya existente
Route::get('/Compras/Configuracion/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
Route::patch('/Compras/Configuracion/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
Route::get('/Compras/Configuracion/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));



Route::resource('COMEstadoOrdenCompras', 'COMEstadoOrdenCompraController');
Route::resource('COMTransicionEstado', 'COMTransicionEstadoController');
=======
});
Route::group(array('prefix' => 'Compras'), function(){
    
    Route::get('Cotizacions/parametrizar', array('as'=>'parametrizar', 'uses'=> 'CotizacionsController@parametrizar'));
    Route::get('Cotizacions/mensaje', array('as'=>'mensaje', 'uses'=> 'CotizacionsController@mensaje'));
    Route::post('Cotizacions/parametrizar/ListaValor', array('as'=>'listavalor', 'uses'=> 'CotizacionsController@lista'));
    //Route::get('Cotizacions/parametrizar/ListaValor', array('as'=>'listavalorview', 'uses'=> 'CotizacionsController@listavista'));
//Route::get('parametrizar', 'CotizacionsController@parametrizar');
    Route::post('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));
//index de editar parametrizar
    Route::get('Cotizacions/editarParametrizar', array('as'=>'editarParametrizar', 'uses'=>'CotizacionsController@editarParametrizar'));
    Route::get('Cotizacions/actualizar', array('as'=>'actualizar', 'uses'=>'CotizacionsController@actualizar'));
    Route::resource('Cotizacions', 'CotizacionsController');
});
//Route::get('Cotizacions/parametrizar', array('as'=>'parametrizar', 'uses'=> 'CotizacionsController@parametrizar'));
//Route::get('Cotizacions/mensaje', array('as'=>'mensaje', 'uses'=> 'CotizacionsController@mensaje'));
////Route::get('parametrizar', 'CotizacionsController@parametrizar');
//Route::post('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));
////index de editar parametrizar
//Route::get('Cotizacions/editarParametrizar', array('as'=>'editarParametrizar', 'uses'=>'CotizacionsController@editarParametrizar'));
//Route::get('Cotizacions/actualizar', array('as'=>'actualizar', 'uses'=>'CotizacionsController@actualizar'));
//Route::resource('Cotizacions', 'CotizacionsController');

>>>>>>> compras
