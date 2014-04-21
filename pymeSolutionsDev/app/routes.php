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

});
   


//////crea un nuevo estado de orden de compras
//Route::get('/Compras/Configuracion/EstadoOrden/Nuevo',array('as'=>'NuevoEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@NuevoEstadoOrden'));
//Route::post('/Compras/Configuracion/EstadoOrden/Nuevo',array('as'=>'AlmacenaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@AlmacenaEstadoOrden'));
//
//////edita un estado de orden de compras ya existente
//Route::get('/Compras/Configuracion/EstadoOrden/Lista',array('as'=>'index','uses'=>'COMEstadoOrdenCompraController@index'));
//Route::get('/Compras/Configuracion/EstadoOrden/Editar',array('as'=>'EditarEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@edit'));
//Route::patch('/Compras/Configuracion/EstadoOrden/Editar',array('as'=>'ActualizaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@update'));
////
//////crea una nueva transicion de estado de orden de compras
//Route::get('/Compras/Configuracion/TransicionEstado/ListaEstados', array('as'=>'ListaEstadoTransicion','uses'=>'COMTransicionEstadoController@ListaEstados'));
//Route::get('/Compras/Configuracion/TransicionEstado/Nueva',array('as'=>'NuevaTransicion','uses'=>'COMTransicionEstadoController@NuevaTransicionEstado'));
//Route::post('/Compras/Configuracion/TransicionEstado/Nueva',array('as'=>'AlmacenaTransicion', 'uses'=>'COMTransicionEstadoController@AlmacenaTransicion'));
////
//////edita una transicion de estado de orden de compras ya existente
//Route::get('/Compras/Configuracion/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
//Route::patch('/Compras/Configuracion/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
//Route::get('/Compras/Configuracion/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));
////
////
////
//Route::resource('COMEstadoOrdenCompras', 'COMEstadoOrdenCompraController');
//Route::resource('COMTransicionEstado', 'COMTransicionEstadoController');


        
        
        
        
    
   
    
	//index de editar parametrizar
   
    

    
    //crea un nuevo estado de orden de compras



Route::group(array('prefix' => 'Compras'), function(){

    //crea un nuevo estado de orden de compras
    Route::get('/', function()
	{
          
		return View::make('Menus.compras');
	});
        
        Route::get('/SolicitudCotizacion', function()
	{
		return View::make('Menus.SolicitudCotizacion');
	});
        
        Route::get('/SolicitudCotizacion/Crear', function()
	{
		return View::make('SolicitudCotizacions.crearindex');
	});

Route::get('Configuracion/EstadoOrden/Nuevo',array('as'=>'NuevoEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@NuevoEstadoOrden'));
Route::post('Configuracion/EstadoOrden/Nuevo',array('as'=>'AlmacenaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@AlmacenaEstadoOrden'));

//edita un estado de orden de compras ya existente
Route::get('Configuracion/EstadoOrden/Lista',array('as'=>'index','uses'=>'COMEstadoOrdenCompraController@index'));
Route::get('Configuracion/EstadoOrden/Editar',array('as'=>'EditarEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@edit'));
Route::patch('Configuracion/EstadoOrden/Editar',array('as'=>'ActualizaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@update'));

//crea una nueva transicion de estado de orden de compras
Route::get('Configuracion/TransicionEstado/ListaEstados', array('as'=>'ListaEstadoTransicion','uses'=>'COMTransicionEstadoController@ListaEstados'));
Route::get('Configuracion/TransicionEstado/Nueva',array('as'=>'NuevaTransicion','uses'=>'COMTransicionEstadoController@NuevaTransicionEstado'));
Route::post('Configuracion/TransicionEstado/Nueva',array('as'=>'AlmacenaTransicion', 'uses'=>'COMTransicionEstadoController@AlmacenaTransicion'));

//edita una transicion de estado de orden de compras ya existente

Route::get('/Configuracion/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
Route::patch('Configuracion/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
Route::get('Configuracion/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));

Route::get('Configuracion/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
Route::patch('Configuracion/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
Route::get('Configuracion/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));

//Crea orden Compra sin Cotizacion
Route::get('OrdenCompra/sinCotizacion/ListaProductos', array('as'=>'IniOrdComSNCot','uses'=>'OrdenComprasController@OrdenComprasnCotizacion'));
Route::post('OrdenCompra/sinCotizacion/Detalle', array('as'=>'OrdenSinCotizacion','uses'=>'OrdenComprasController@FormOrdenComprasnCotizacion'));
Route::post('OrdenCompra/sinCotizacion/Guardar', array('as'=>'GuardaOCsnCot','uses'=>'OrdenComprasController@guardarOCsnCOT'));

//generar pago
Route::get('OrdenCompra/GenerarPago/ListaCotizaciones', array('as'=>'generarpagoLC','uses'=>'OrdenComprasController@generarpagoLC'));
Route::get('OrdenCompra/GeneraPago/Detalle', array('as'=>'DetallePago','uses'=>'OrdenComprasController@DetallePago'));
Route::post('OrdenCompra/GenerarPago/Guardar', array('as'=>'GuardaPago','uses'=>'OrdenComprasController@GuardaPago'));


//crea oden de compra con cotizacion
Route::get('OrdenCompra/conCotizacion/ListaCotizaciones', array('as'=>'IniOrdComCnCot','uses'=>'OrdenComprasController@OrdenCompracnCotizacion'));
Route::post('OrdenCompra/conCotizacion/CompararCotizaciones', array('as'=>'CompararCotizaciones','uses'=>'OrdenComprasController@ComparaCotizaciones'));
Route::get('OrdenCompra/conCotizacion/Detalle', array('as'=>'ComCot','uses'=>'OrdenComprasController@FormOrdenCompracnCotizacion'));
Route::post('OrdenCompra/conCotizacion/Guardar', array('as'=>'GuardaOCcnCot','uses'=>'OrdenComprasController@guardarOCcnCOT'));
Route::get('/hola',  function (){
    return View::make('OrdenCompras.newOrdenCompra');
});

//autorizaciones de orden de Compra
Route::get('OrdenCompra/Autorizacion/ListaOrdenes', array('as'=>'AutOrdCom','uses'=>'OrdenComprasController@ListaOrdenCompra'));
Route::get('OrdenCompra/Autorizacion/Autorizar', array('as'=>'AutOrdComForm','uses'=>'OrdenComprasController@AutorizandoOrdenCompra'));
Route::get('OrdenCompra/Autorizacion/Autorizado', array('as'=>'AutorizarOrdCom','uses'=>'OrdenComprasController@AutorizarOrden'));
Route::get('OrdenCompra/Autorizacion/Cancelado', array('as'=>'CancelaOrdCom','uses'=>'OrdenComprasController@cancelarOrden'));


//Administrar Ordenes de Compra
Route::get('OrdenCompra/Autorizacion/ListarOrdenes', array('as'=>'AutOrdCom','uses'=>'OrdenComprasController@ListarOrdenCompra'));
Route::get('OrdenCompra/Autorizacion/Administrar', array('as'=>'AdministraOrCOm','uses'=>'OrdenComprasController@AdministraDetalles'));
Route::post('OrdenCompra/Autorizacion/Administrada', array('as'=>'cambioAdministracio','uses'=>'OrdenComprasController@AndministrarOC'));

//Historial de Ordenes de Compra
Route::get('OrdenCompra/Historial/ListarOrdenes', array('as'=>'ListaOrdenes','uses'=>'OrdenComprasController@HistorialOrdenes'));
Route::get('OrdenCompra/Historial/Orden', array('as'=>'HistorialOrden','uses'=>'OrdenComprasController@HistorialOrden'));

Route::resource('COMEstadoOrdenCompras', 'COMEstadoOrdenCompraController');
Route::resource('COMTransicionEstado', 'COMTransicionEstadoController');

    Route::get('Configuracion/OrdenCompra/editarorden', array('as'=>'editar', 'uses'=>'OrdenComprasController@editar'));
    Route::patch('Configuracion/OrdenCompra/actualizar', array('as'=>'actualizar', 'uses'=>'OrdenComprasController@actualizar'));
    Route::resource('Cotizacions', 'CotizacionsController');
    Route::resource('OrdenCompras', 'OrdencomprasController');
    Route::get('SolicitudCotizacion/Crear/CualquierProducto', array('as'=>'cualquierProducto', 'uses'=> 'SolicitudCotizacionsController@vistacrear'));
    Route::get('SolicitudCotizacion/Crear/Reorden', array('as'=>'reOrden', 'uses'=> 'SolicitudCotizacionsController@vistaReorden'));
    Route::get('SolicitudCotizacion/Crear/MostrarDetalle', array('as'=>'detalle', 'uses'=> 'SolicitudCotizacionsController@detalle'));
    Route::post('SolicitudCotizacion/Crear/detalleCualquierProducto', array('as'=>'seleccion', 'uses'=> 'SolicitudCotizacionsController@mostrarProveedor'));
    Route::resource('SolicitudCotizacions', 'SolicitudCotizacionsController');
    Route::resource('CampoLocal', 'CompraCampoLocalController'); 


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
     Route::resource('OrdenCompras', 'OrdencomprasController');

});





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