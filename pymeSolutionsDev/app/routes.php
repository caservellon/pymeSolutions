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


Route::group(array('prefix' => 'Inventario'), function()
{

	Route::resource('Ciudad', 'CiudadController');

	Route::resource('UnidadMedidas', 'UnidadMedidasController');

	Route::resource('Categoria', 'CategoriaController');

	Route::resource('Atributos', 'AtributosController');

	Route::resource('Proveedor', 'ProveedorController');

	Route::resource('Productos', 'ProductosController');

	Route::resource('Horarios', 'HorariosController');

	Route::resource('FormaPagos', 'FormaPagosController');

	Route::post('Proveedor/search_index', array('as' => 'Proveedor.search_index', 'uses' =>'ProveedorController@search_index'));

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


Route::group(array('prefix' => 'Compras'), function(){
    
    Route::get('Cotizacions/parametrizar', array('as'=>'parametrizar', 'uses'=> 'CotizacionsController@parametrizar'));
    Route::get('Cotizacions/mensaje', array('as'=>'mensaje', 'uses'=> 'CotizacionsController@mensaje'));
    Route::post('Cotizacions/parametrizar/ListaValor', array('as'=>'listavalor', 'uses'=> 'CotizacionsController@lista'));
    Route::get('Cotizacions/parametrizar/ListaValor', array('as'=>'listavalorview', 'uses'=> 'CotizacionsController@listavista'));
	Route::get('parametrizar', 'CotizacionsController@parametrizar');
    Route::post('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));
	//index de editar parametrizar
    Route::get('Cotizacions/editarParametrizar', array('as'=>'editarParametrizar', 'uses'=>'CotizacionsController@editarParametrizar'));
    Route::get('Cotizacions/actualizar', array('as'=>'actualizar', 'uses'=>'CotizacionsController@actualizar'));
    Route::resource('Cotizacions', 'CotizacionsController');
});
Route::get('Cotizacions/parametrizar', array('as'=>'parametrizar', 'uses'=> 'CotizacionsController@parametrizar'));
Route::get('Cotizacions/mensaje', array('as'=>'mensaje', 'uses'=> 'CotizacionsController@mensaje'));
Route::get('parametrizar', 'CotizacionsController@parametrizar');
Route::post('Cotizacions/campoLocal', array('as'=>'campoLocal', 'uses'=> 'CotizacionsController@campoLocal'));
////index de editar parametrizar
Route::get('Cotizacions/editarParametrizar', array('as'=>'editarParametrizar', 'uses'=>'CotizacionsController@editarParametrizar'));
Route::get('Cotizacions/actualizar', array('as'=>'actualizar', 'uses'=>'CotizacionsController@actualizar'));
Route::resource('Cotizacions', 'CotizacionsController');




Route::resource('contabilidad/configuracion/unidadmonetaria', 'UnidadMonetariaController');
Route::resource('contabilidad/configuracion/periodocontable', 'ParamPeriodoContableController');
Route::resource('clasificacion-cuentas','ClasificacionCuentaController');
Route::resource('contabilidad/configuracion/catalogocuentas', 'CatalogoContablesController');
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
Route::resource('contabilidad/asientocontable','AsientosController');
Route::get('contabilidad/crear/asientocontable',array('uses'=>'AsientosController@create'));


//crm

Route::resource('Personas', 'PersonasController');

Route::resource('ValorCampoLocalCRMs', 'ValorCampoLocalCRMsController');

Route::resource('CampoLocals', 'CampoLocalsController');

Route::resource('CampoLocalLista', 'CampoLocalListaController');


Route::group(array('prefix' => 'Ventas'), function(){

	Route::get('/', function()
	{
		return View::make('Menus.ventas');
	});

	Route::resource('AperturaCajas', 'AperturacajasController');
	Route::get('AperturaCajas/Abrir/{id}', array('as' => 'Ventas.AperturaCajas.abrir', 'uses' => 'AperturacajasController@abrir'));

	Route::resource('Ventas', 'VentasController');

	Route::resource('Descuentos', 'DescuentosController');

	Route::resource('DetalleDeVenta', 'DetalleDeVentaController');

	Route::resource('FormaPagos', 'FormaPagosController');

	Route::resource('EstadoBonos', 'EstadobonosController');

	Route::resource('BonoDeCompras', 'BonodecomprasController');

	Route::resource('Devoluciones', 'DevolucionesController');

	Route::resource('DetalleDevoluciones', 'DetalleDevolucionesController');

	Route::resource('Cajas', 'CajasController');

	Route::resource('CierreCajas', 'CierreCajasController');

	Route::resource('PeriodoCierreDeCajas', 'PeriodoCierreDeCajasController');


});

