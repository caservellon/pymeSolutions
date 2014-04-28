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
	Route::get('/', function()
	{
		return View::make('Menus.inventario');
	});

		Route::resource('Ciudad', 'CiudadController');
		Route::resource('UnidadMedidas', 'UnidadMedidasController');
		Route::resource('Categoria', 'CategoriaController');
		Route::resource('Atributos', 'AtributosController');

		Route::resource('Proveedor', 'ProveedorController');
		Route::post('/Proveedor/campolocalsave', array('as' => 'Inventario.Proveedor.campolocalsave', 'uses' => 'ProveedorController@campolocalsave'));
		Route::post('Proveedor/search_index', array('as' => 'Proveedor.search_index', 'uses' =>'ProveedorController@search_index'));

		Route::resource('Productos', 'ProductosController');
		Route::post('/Productos/campolocalsave', array('as' => 'Inventario.Productos.campolocalsave', 'uses' => 'ProductosController@campolocalsave'));

		Route::resource('Horarios', 'HorariosController');
		Route::resource('FormaPagos', 'FormaPagosController');
		Route::resource('CampoLocals', 'CampoLocalsController');
		Route::resource('DetalleMovimiento', 'DetallemovimientosController');
		Route::resource('SalidaInventario', 'SalidaInventariosController');
		Route::resource('DetalleSalida', 'DetalleSalidasController');

		Route::get('DetalleMovimiento/Agregar/{id}', array('as' => 'Inventario.DetalleMovimiento.Agregar', 'uses' =>'DetallemovimientosController@agregar'));
		Route::get('DetalleMovimiento/Detalles/{id}', array('as' => 'Inventario.MovimientoInventario.Detalles', 'uses' =>'MovimientoinventariosController@detalles'));
		Route::get('DetalleMovimiento/Terminar/{id}', array('as' => 'Inventario.MovimientoInventario.Terminar', 'uses' =>'MovimientoinventariosController@detalles'));
		Route::post('DetalleMovimiento/search', array('as' => 'Inventario.DetalleMovimiento.search', 'uses' =>'DetallemovimientosController@search'));

		Route::resource('MotivoMovimiento', 'MotivomovimientosController');
		Route::get('MovimientoInventario/Salida', array('as' => 'Inventario.MovimientoInventario.Salida', 'uses' =>'MovimientoinventariosController@salidas'));
		Route::get('MovimientoInventario/Entrada', array('as' => 'Inventario.MovimientoInventario.Entrada', 'uses' =>'MovimientoinventariosController@entradas'));
		
		Route::get('DetalleSalida/Agregar/{id}', array('as' => 'Inventario.DetalleSalida.Agregar', 'uses' =>'DetalleSalidasController@agregar'));

		Route::resource('MovimientoInventario', 'MovimientoinventariosController');

		Route::post('DetalleSalida/search', array('as' => 'Inventario.DetalleSalida.search', 'uses' =>'DetalleSalidasController@search'));

});
   


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
        
        Route::group(array('prefix' => 'Configuracion'), function(){
		Route::get('/EstadoOrden/Nuevo',array('as'=>'NuevoEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@NuevoEstadoOrden'));
                Route::post('/EstadoOrden/Nuevo',array('as'=>'AlmacenaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@AlmacenaEstadoOrden'));

                //edita un estado de orden de compras ya existente
                Route::get('/EstadoOrden/Lista',array('as'=>'index','uses'=>'COMEstadoOrdenCompraController@index'));
                Route::get('/EstadoOrden/Editar',array('as'=>'EditarEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@edit'));
                Route::patch('/EstadoOrden/Editar',array('as'=>'ActualizaEstadoOrdenCompra','uses'=>'COMEstadoOrdenCompraController@update'));

                //crea una nueva transicion de estado de orden de compras
                Route::get('/TransicionEstado/ListaEstados', array('as'=>'ListaEstadoTransicion','uses'=>'COMTransicionEstadoController@ListaEstados'));
                Route::get('/TransicionEstado/Nueva',array('as'=>'NuevaTransicion','uses'=>'COMTransicionEstadoController@NuevaTransicionEstado'));
                Route::post('/TransicionEstado/Nueva',array('as'=>'AlmacenaTransicion', 'uses'=>'COMTransicionEstadoController@AlmacenaTransicion'));

                Route::get('/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
                Route::patch('/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
                Route::get('/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));

                Route::get('/TransicionEstado/Editar',array('as'=>'EditarTransicion', 'uses'=>'COMTransicionEstadoController@EditarTransicion'));
                Route::patch('/TransicionEstado/Editar',array('as'=>'ActualizarTransicion','uses'=>'COMTransicionEstadoController@ActualizarTransicion'));
                Route::get('/TransicionEstado/Lista', array('as'=>'ListaTransicion','uses'=>'COMTransicionEstadoController@ListaTransiciones'));
                Route::resource('CampoLocal', 'CompraCampoLocalController'); 
	});
        Route::get('mensaje', array('as'=>'mensaje', 'uses'=> 'CotizacionsController@mensaje'));


        Route::get('SolicitudCotizacion/Crear/CualquierProducto', array('as'=>'cualquierProducto', 'uses'=> 'SolicitudCotizacionsController@vistacrear'));
        Route::get('SolicitudCotizacion/Crear/Reorden', array('as'=>'reOrden', 'uses'=> 'SolicitudCotizacionsController@vistaReorden'));
        Route::get('SolicitudCotizacion/Crear/MostrarDetalle', array('as'=>'detalle', 'uses'=> 'SolicitudCotizacionsController@detalle'));
        Route::post('SolicitudCotizacion/Crear/detalleCualquierProducto', array('as'=>'seleccion', 'uses'=> 'SolicitudCotizacionsController@mostrarProveedor'));
        Route::resource('SolicitudCotizacions', 'SolicitudCotizacionsController');
//edita una transicion de estado de orden de compras ya existente



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
    
    

    Route::resource('Cotizacions', 'CotizacionsController');
    Route::resource('OrdenCompras', 'OrdencomprasController');

});



Route::group(array('prefix' => 'contabilidad'),function(){
			Route::get('/',function ()
			{
				return View::make('Menus.contabilidad');
			});
			
			Route::resource('clasificacioncuentas','ClasificacionCuentaController');
			Route::resource('motivotransaccion', 'MotivoTransaccionsController');
			Route::resource('detalleasientos', 'DetalleAsientosController');
			Route::resource('cuentamotivos', 'CuentaMotivosController');
			Route::resource('asientocontable','AsientosController');
			Route::resource('librodiario','LibroDiarioController');
			Route::resource('balanzacomprobacion','BalanzaComprobacionController');
			Route::resource('estadoresultados', 'EstadoresultadosController');

			Route::get('librodiario',array('uses' => 'LibroDiarioController@index'));
			Route::get('crear/asientocontable',array('uses'=>'AsientosController@create'));
			Route::get('motivotransaccion',array('uses' => 'MotivoTransaccionsController@index'));
			Route::get('creando/motivotransaccion',array('uses'=>'AsientosController@creandomotivo'));
			
			
			Route::post('librodiario/revertirasiento',array('as'=>'revertirasiento', 'uses' => 'LibroDiarioController@reversion'));
			Route::post('crear/motivotransaccion',array('as'=>'crearmotivo','uses'=>'AsientosController@crearmotivo'));
			Route::post('librodiario', array('uses'=>'LibroDiarioController@index'));			
			Route::post('crear/asientocontable/cargar/cuentas',array('as'=>'cargarcuentas', 'uses'=>'AsientosController@cargarcuentas'));
			Route::post('creando/motivotransaccion',array('as'=>'creandomotivo','uses'=>'AsientosController@creandomotivo'));

			Route::group(array('prefix'=>'configuracion'),function ()
			{
				Route::get('/',function(){
							return View::make('Menus.config_contabilidad');
				});
				Route::resource('subcuentas', 'SubcuentaController');
				Route::resource('unidadmonetaria', 'UnidadMonetariaController');
				Route::resource('periodocontable', 'ParamPeriodoContableController');
				Route::resource('catalogocuentas', 'CatalogoContablesController');

				Route::get('unidadmonetaria',array('as'=>'unidadmonetaria', 'uses' => 'UnidadMonetariaController@index'));
				Route::get('periodocontable',array('as'=>'periodocontable', 'uses' => 'ParamPeriodoContableController@index'));
				Route::get('subcuentas',array ('as'=>'subcuentas', 'uses' => 'SubcuentaController@index'));
				//Route::post('catalogo-contable/cambiarestado', array('uses'=>'CatalogoContablesController@cambiarestado'));
			});

			Route::group(array('prefix'=>'cierreperiodo'),function(){
				Route::get('/',array('as'=>'con.cierreperiodo','uses'=>'CierrePeriodoController@index'));

				Route::post('mayorizacion',array('as'=>'con.mayorizar', 'uses'=>'CierrePeriodoController@mayorizar'));
				Route::post('balanzacomprobacion',array('as'=>'con.balanza','uses'=>'CierrePeriodoController@balanza'));
				Route::post('estadoresultados',array('as'=>'con.estado','uses'=>'CierrePeriodoController@estado'));
				Route::post('balancegeneral',array('as'=>'con.balance','uses'=>'CierrePeriodoController@balance'));
			});


	});









//crm
Route::group(array('prefix' => 'CRM'), function(){
	Route::get('/',function(){
		return View::make('Menus.crm');
	});

	Route::resource('Empresas', 'EmpresasController');
	
	Route::resource('Personas', 'PersonasController');

	Route::resource('TipoDocumentos', 'TipoDocumentosController');

	Route::resource('ValorCampoLocalCRMs', 'ValorCampoLocalCRMsController');

	Route::resource('CampoLocals', 'CRMCampoLocalsController');

});



Route::group(array('prefix' => 'Ventas'), function(){

	Route::get('/', function()
	{
		return View::make('Menus.ventas');
	});

	Route::resource('AperturaCajas', 'AperturacajasController');
	Route::get('AperturaCajas/Abrir/{id}', array('as' => 'Ventas.AperturaCajas.abrir', 'uses' => 'AperturacajasController@abrir'));

	Route::get('Listar', array('as' => 'Ventas.Listar','uses' => 'VentasController@Listar'));
	Route::get('Listar/{id}', array('as' => 'Ventas.ListarOne', 'uses' => 'VentasController@ListarOne'));

	Route::get('Devs', array('as' => 'Ventas.Devs','uses' => 'VentasController@Devs'));
	Route::get('Devs/{id}', array('as' => 'Ventas.DevsOne', 'uses' => 'VentasController@DevsOne'));
	
	Route::resource('Ventas', 'VentasController');
	Route::post('Ventas/guardar', array('as' => 'Ventas.Ventas.guardar','uses' => 'VentasController@guardar'));
	Route::post('Ventas/searchInvoice', array('as' => 'Ventas.Ventas.searchInvoice', 'uses' => 'VentasController@searchInvoice'));
	Route::post('Ventas/checkStock', array('as' => 'Ventas.Ventas.checkStock', 'uses' => 'VentasController@checkStock'));

	Route::resource('Descuentos', 'DescuentosController');

	Route::resource('DetalleDeVenta', 'DetalleDeVentaController');

	Route::resource('FormaPagos', 'FormaPagosController');

	Route::resource('EstadoBonos', 'EstadobonosController');

	Route::resource('BonoDeCompras', 'BonodecomprasController');

	Route::resource('Devoluciones', 'DevolucionesController');
	Route::post('Devoluciones/process', array('as' => 'Ventas.Devoluciones.process', 'uses' => 'DevolucionesController@process'));

	Route::resource('DetalleDevoluciones', 'DetalleDevolucionesController');

	Route::resource('Cajas', 'CajasController');

	Route::resource('CierreCajas', 'CierreCajasController');

	Route::resource('PeriodoCierreDeCajas', 'PeriodoCierreDeCajasController');

	Route::resource('Pagos', 'PagosController');

	Route::resource('FormaPagoVenta', 'FormaPagoVentaController');

});





Route::resource('tipodocumentos', 'TipodocumentosController');

Route::resource('productocampolocals', 'ProductocampolocalsController');

Route::resource('proveedorcampolocals', 'ProveedorcampolocalsController');




