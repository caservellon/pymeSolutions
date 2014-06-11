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

// Seguridad

Route::get('/403', function(){
	return View::make('Roles.403');
});
Route::any('login', array('as' => 'Auth.login', 'uses' => 'UserController@login'));

Route::group(array('prefix' => 'Auth', 'before' => 'auth'), function()
{
	Route::any('login', array('as' => 'Auth.login', 'uses' => 'UserController@login'));
	Route::any('logout', array('as' => 'Auth.logout', 'uses' => 'UserController@logout'));
	Route::resource('Usuarios', 'UserController');
	Route::resource('Roles', 'RolesController');
	Route::resource('Errores', 'ErrorController');
	Route::resource('Configuracion', 'ConfigController');
	Route::get('prueba', array('as' => 'Auth.test', 'uses' => 'RolesController@ejemplo'));
	Route::get('Cambio', array('as' => 'Auth.renderCambio', 'uses' => 'UserController@renderCambio'));
	Route::post('Cambio', array('as' => 'Auth.cambio', 'uses' => 'UserController@cambio'));
});

Route::group(array('prefix'=>'mantenimiento'),function(){

	Route::get('/',function(){
		return View::make('Menus.mode');
	},array('as'=>'mantenimiento'));

	Route::post('up',array('as'=>'mantenimiento.up','uses'=>function(){
		Artisan::call('up');
		return Response::json(array('success'=>true));
	}));

	Route::post('down',array('as'=>'mantenimiento.down','uses'=>function(){
		Artisan::call('down');
	},));
	
});


//Inventario

Route::group(array('prefix' => 'Inventario', 'before' => 'auth'), function()
{
	Route::get('/', function()
	{
		return View::make('Menus.inventario');
	});

	Route::get('/Proveedor/f2p', array('as' => 'Inventario.Proveedor.f2p', 'uses' => 'ProveedorController@create3'));
	Route::post('/Proveedor/f2p', array('as' => 'Proveedor.save2', 'uses' => 'ProveedorController@save2'));
	Route::post('/Proveedor/FDP', array('as' => 'Proveedor.FDP', 'uses' => 'ProveedorController@FDP'));


	Route::get('/Proveedor/p2p', array('as' => 'Inventario.Proveedor.save', 'uses' => 'ProveedorController@create2'));
	Route::post('/Proveedor/p2p', array('as' => 'Proveedor.save', 'uses' => 'ProveedorController@save'));
	Route::post('/Proveedor/editarFormaPago', array('as' => 'Proveedor.editarFormaPago', 'uses' => 'ProveedorController@editarFormaPago'));


	Route::get('/Productos/p2p', function(){
    	return View::make('Productos/p2p');
	});
	
	Route::post('/Productos/p2p', array('as' => 'Productos.save', 'uses' => 'ProductosController@save'));

		Route::resource('Ciudad', 'CiudadController');
		Route::resource('UnidadMedidas', 'UnidadMedidasController');
		Route::resource('Categoria', 'CategoriaController');
		Route::resource('Atributos', 'AtributosController');

		Route::resource('Proveedor', 'ProveedorController');
		Route::post('/Proveedor/campolocalsave', array('as' => 'Inventario.Proveedor.campolocalsave', 'uses' => 'ProveedorController@campolocalsave'));
		Route::post('Proveedor/search_index', array('as' => 'Proveedor.search_index', 'uses' =>'ProveedorController@search_index'));
		Route::post('Productos/search_index', array('as' => 'Productos.search_index', 'uses' =>'ProductosController@search_index'));
		Route::post('DetalleMovimiento/search_index', array('as' => 'DetalleMovimientos.search_index', 'uses' =>'DetalleMovimientosController@search_index'));
		Route::post('DetalleMovimiento/history/{id}', array('as' => 'DetalleMovimientos.history', 'uses' =>'DetalleMovimientosController@history'));

		Route::get('/Productos/historial', array('as' => 'Inventario.Producto.historial.index2', 'uses' => "ProductosController@index2"));
		Route::resource('Productos', 'ProductosController');
		Route::post('Productos/historial/search_index', array('as' => 'Productos.search_index2', 'uses' =>'ProductosController@search_index2'));
		Route::post('/Productos/campolocalsave', array('as' => 'Inventario.Productos.campolocalsave', 'uses' => 'ProductosController@campolocalsave'));


		Route::resource('Horarios', 'HorariosController');
		Route::resource('FormaPagos', 'FormaPagosController');
		Route::resource('CampoLocals', 'CampoLocalsController');
		Route::resource('DetalleMovimiento', 'DetalleMovimientosController');
		Route::resource('SalidaInventario', 'SalidaInventariosController');
		Route::resource('DetalleSalida', 'DetalleSalidasController');

		Route::get('DetalleMovimiento/Agregar/{id}', array('as' => 'Inventario.DetalleMovimiento.Agregar', 'uses' =>'DetalleMovimientosController@agregar'));
		Route::get('DetalleMovimiento/Detalles/{id}', array('as' => 'Inventario.MovimientoInventario.Detalles', 'uses' =>'MovimientoInventariosController@detalles'));
		Route::get('DetalleMovimiento/Terminar/{id}', array('as' => 'Inventario.MovimientoInventario.Terminar', 'uses' =>'MovimientoInventariosController@detalles'));
		Route::post('DetalleMovimiento/search', array('as' => 'Inventario.DetalleMovimiento.search', 'uses' =>'DetalleMovimientosController@search'));

		Route::resource('MotivoMovimiento', 'MotivoMovimientosController');
		Route::get('MovimientoInventario/Salida', array('as' => 'Inventario.MovimientoInventario.Salida', 'uses' =>'MovimientoInventariosController@salidas'));
		Route::get('MovimientoInventario/Entrada', array('as' => 'Inventario.MovimientoInventario.Entrada', 'uses' =>'MovimientoInventariosController@entradas'));
		
		Route::get('DetalleSalida/Agregar/{id}', array('as' => 'Inventario.DetalleSalida.Agregar', 'uses' =>'DetalleSalidasController@agregar'));

		Route::get('MovimientoInventario/Orden', array('as' => 'Inventario.MovimientoInventario.Orden', 'uses' =>'MovimientoInventariosController@ordenes'));
		Route::post('MovimientoInventario/search', array('as' => 'Inventario.MovimientoInventario.search', 'uses' =>'MovimientoInventariosController@search'));
		Route::post('MovimientoInventario/Recibida', array('as' => 'Inventario.MovimientoInventario.Recibida', 'uses' =>'MovimientoInventariosController@recibida'));
		Route::post('MovimientoInventario/Rechazada', array('as' => 'Inventario.MovimientoInventario.Rechazada', 'uses' =>'MovimientoInventariosController@rechazada'));
		Route::post('MovimientoInventario/RecibidaErrores', array('as' => 'Inventario.MovimientoInventario.Errores', 'uses' =>'MovimientoInventariosController@errores'));

		Route::resource('MovimientoInventario', 'MovimientoInventariosController');

		Route::resource('ProductosRechazados', 'ProductorechazadosController');

		Route::post('DetalleSalida/search', array('as' => 'Inventario.DetalleSalida.search', 'uses' =>'DetalleSalidasController@search'));

});
   


Route::group(array('prefix' => 'Compras', 'before' => 'auth'), function(){

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
		return View::make('SolicitudCotizacions.crearIndex');
	});
        
        Route::get('/OrdenCompra', function()
	{
		return View::make('Menus.OrdenCompra');
	});
        
        Route::get('/OrdenCompra/Crear', function()
	{
		return View::make('OrdenCompras.menuordencompra');
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
	Route::get('SolicitudCotizacion/Imprimir', array('as'=>'Imprimir', 'uses'=> 'SolicitudCotizacionsController@indexImprimir'));
	Route::get('SolicitudCotizacion/Impresion', array('as'=>'impresion', 'uses'=> 'SolicitudCotizacionsController@imprimir'));
        Route::post('SolicitudCotizacion/Imprimir', array('as' => 'SolicitudCotizacions.buscarCualquierProveedor', 'uses' =>'SolicitudCotizacionsController@buscarCualquierProveedor'));

        Route::get('SolicitudCotizacion/Crear/Reorden', array('as'=>'reOrden', 'uses'=> 'SolicitudCotizacionsController@vistaReorden'));
        Route::get('SolicitudCotizacion/Crear/MostrarDetalle', array('as'=>'detalle', 'uses'=> 'SolicitudCotizacionsController@detalle'));
        Route::post('SolicitudCotizacion/Crear/detalleCualquierProducto', array('as'=>'seleccion', 'uses'=> 'SolicitudCotizacionsController@mostrarProveedor'));
        Route::post('SolicitudCotizacion', array('as' => 'SolicitudCotizacions.search_index', 'uses' =>'SolicitudCotizacionsController@search_index'));
        Route::post('SolicitudCotizacion/Crear/CualquierProducto', array('as' => 'SolicitudCotizacions.buscarCualquierProducto', 'uses' =>'SolicitudCotizacionsController@buscarCualquierProducto'));
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
// vistas plan de pago
	Route::get('OrdenCompra/PlanPago/Lista', array('as'=>'ListaPlanes','uses'=>'OrdenComprasController@ListaPlanes'));
	Route::get('OrdenCompra/PlanPago/Detalle', array('as'=>'DetallePlanPago','uses'=>'OrdenComprasController@DetallePlanPago'));

    //crea oden de compra con cotizacion
    Route::get('OrdenCompra/conCotizacion/ListaCotizaciones', array('as'=>'IniOrdComCnCot','uses'=>'OrdenComprasController@OrdenCompracnCotizacion'));
    Route::post('OrdenCompra/conCotizacion/CompararCotizaciones', array('as'=>'CompararCotizaciones','uses'=>'OrdenComprasController@ComparaCotizaciones'));
    Route::get('OrdenCompra/conCotizacion/Detalle', array('as'=>'ComCot','uses'=>'OrdenComprasController@FormOrdenCompracnCotizacion'));
    Route::post('OrdenCompra/conCotizacion/Guardar', array('as'=>'GuardaOCcnCot','uses'=>'OrdenComprasController@guardarOCcnCOT'));
    /*Route::get('/hola',  function (){
        return View::make('OrdenCompras.newOrdenCompra');
    });*/

    //autorizaciones de orden de Compra
    Route::get('OrdenCompra/Autorizacion/ListaOrdenes', array('as'=>'AutOrdCom','uses'=>'OrdenComprasController@ListaOrdenCompra'));
    Route::get('OrdenCompra/Autorizacion/Autorizar', array('as'=>'AutOrdComForm','uses'=>'OrdenComprasController@AutorizandoOrdenCompra'));
    Route::get('OrdenCompra/Autorizacion/Autorizado', array('as'=>'AutorizarOrdCom','uses'=>'OrdenComprasController@AutorizarOrden'));
    Route::get('OrdenCompra/Autorizacion/Cancelado', array('as'=>'CancelaOrdCom','uses'=>'OrdenComprasController@cancelarOrden'));


    //Administrar Ordenes de Compra
    Route::get('OrdenCompra/Autorizacion/ListarOrdenes', array('as'=>'AdminOrdCom','uses'=>'OrdenComprasController@ListarOrdenCompra'));
    Route::get('OrdenCompra/Autorizacion/Administrar', array('as'=>'AdministraOrCOm','uses'=>'OrdenComprasController@AdministraDetalles'));
    Route::post('OrdenCompra/Autorizacion/Administrada', array('as'=>'cambioAdministracio','uses'=>'OrdenComprasController@AndministrarOC'));

    //Historial de Ordenes de Compra
    Route::get('OrdenCompra/Historial/ListarOrdenes', array('as'=>'ListaOrdenes','uses'=>'OrdenComprasController@HistorialOrdenes'));
    Route::get('OrdenCompra/Historial/Orden', array('as'=>'HistorialOrden','uses'=>'OrdenComprasController@HistorialOrden'));
    //orden compra imprimir
    Route::get('OrdenCompra/Imprimir', array('as'=>'ImprimirOrden', 'uses'=> 'OrdenComprasController@indexImprimir'));
    Route::get('OrdenCompra/Impresion', array('as'=>'impresionOrden', 'uses'=> 'OrdenComprasController@imprimir'));
    //index
    Route::get('OrdenCompra/index', array('as'=>'Compras.OrdenCompra.index', 'uses'=> 'OrdenComprasController@index'));

    
    
    
    Route::resource('COMEstadoOrdenCompras', 'COMEstadoOrdenCompraController');
    Route::resource('COMTransicionEstado', 'COMTransicionEstadoController');

    Route::get('Configuracion/OrdenCompra/editarorden', array('as'=>'editar', 'uses'=>'OrdenComprasController@editar'));
    Route::patch('Configuracion/OrdenCompra/actualizar', array('as'=>'actualizar', 'uses'=>'OrdenComprasController@actualizar'));
    Route::post('search_Producto', array('as' => 'OrdenCompra.search_Producto', 'uses' =>'OrdenComprasController@search_Producto'));
     Route::post('search_Cotizaciones', array('as' => 'OrdenCompra.search_Cotizaciones', 'uses' =>'OrdenComprasController@search_Cotizaciones'));
    Route::resource('Cotizacions', 'CotizacionsController');
    Route::resource('OrdenCompras', 'OrdencomprasController');
    
    //devoluciones
     Route::get('DevolucionCompra/Lista', array('as'=>'ListaDevolucion','uses'=>'DevolucionCompraController@ListaDevolucion'));
     Route::get('DevolucionCompra/Detalle', array('as'=>'DevolucionCompra','uses'=>'DevolucionCompraController@DevolucionCompraDetalle'));
      Route::post('DevolucionCompra/Guardado', array('as'=>'guardaDevolucion','uses'=>'DevolucionCompraController@guardaDevolucion'));
    

    Route::resource('Cotizacions', 'CotizacionsController');
    Route::resource('OrdenCompras', 'OrdencomprasController');
    Route::resource('DevolucionCompra', 'DevolucionCompraController');
	
	
	
	
	
	
	Route::get('/Parametrizar/SolicitudCotizacion', array(
		'as' => 'ParametrizarSolicitudCotizacion',
		'uses' => 'SolicitudCotizacionController@VistaParametrizarSolicitudCotizacion'
	));
	Route::get('/Parametrizar/SolicitudCotizacion/CrearCampoLocal', array(
		'as' => 'ParametrizarSolicitudCotizacionCrearCampoLocal',
		'uses' => 'SolicitudCotizacionController@VistaParametrizarSolicitudCotizacionCrearCampoLocal'
	));
	Route::get('/Parametrizar/SolicitudCotizacion/CrearCampoLocal/Mensaje', array(
		'as'=>'ParametrizarSolicitudCotizacionCrearCampoLocalMensaje',
		'uses'=> 'SolicitudCotizacionController@Mensaje'
	));
	
	Route::post('/Parametrizar/SolicitudCotizacion', 'SolicitudCotizacionController@CrearCampoLocal');
	Route::post('/Parametrizar/SolicitudCotizacion/ListaValor', array(
		'as' => 'ListaValor',
		'uses'=> 'SolicitudCotizacionController@Lista'
	));
	
	Route::get('/Parametrizar/SolicitudCotizacion/EditarCampoLocal', array(
		'as' => 'ParametrizarSolicitudCotizacionEditarCampoLocal',
		'uses' => 'SolicitudCotizacionController@Editar'
	));
	Route::patch('/Parametrizar/SolicitudCotizacion/EditarCampoLocal', array(
		'as' => 'ParametrizarSolicitudCotizacionActualizarCampoLocal',
		'uses' => 'SolicitudCotizacionController@EditarCampoLocal'
	));
	
	
	Route::get('/Cotizaciones', array(
		'as' => 'MenuCotizaciones',
		'uses' => 'CotizacionController@VistaMenuCotizaciones'
	));
	
	Route::get('/Cotizaciones/CapturarCotizacion', array(
		'as' => 'CotizacionesCapturarCotizacion',
		'uses' => 'CotizacionController@VistaCapturarCotizacion'
	));
	Route::post('/Cotizaciones/CapturarCotizacion', array(
		'as' => 'CotizacionesCapturarCotizacion',
		'uses' => 'CotizacionController@CapturarCotizacion'
	));
	
	Route::get('/Cotizaciones/CapturarCotizacion/Capturar', array(
		'as' => 'CotizacionesCapturarCotizacionCapturar',
		'uses' => 'CotizacionController@VistaCapturarCotizacionCapturar'
	));
	Route::post('/Cotizaciones/CapturarCotizacion/Capturar', array(
		'as' => 'CotizacionesCapturarCotizacionCapturar',
		'uses' => 'CotizacionController@CapturarCotizacionCapturar'
	));
	
	Route::get('/Cotizaciones/HabilitarInhabilitar', array(
		'as' => 'CotizacionesHabilitarInhabilitar',
		'uses' => 'CotizacionController@VistaHabilitarInhabilitar'
	));
	Route::post('/Cotizaciones/HabilitarInhabilitar', array(
		'as' => 'CotizacionesHabilitarInhabilitar',
		'uses' => 'CotizacionController@HabilitarInhabilitar'
	));
	
	Route::get('/Cotizaciones/CapturarCotizacion/Capturar/MensajeCotizacionCapturada', array(
		'as' => 'CotizacionesCapturarCotizacionCapturarMensajeCotizacionCapturada',
		'uses' => 'CotizacionController@VistaCapturarCotizacionCapturarMensajeCotizacionCapturada'
	));
	
	Route::get('/Cotizaciones/HabilitarInhabilitar/MensajeEstadoCotizacionCambiado', array(
		'as' => 'CotizacionesHabilitarInhabilitarMensajeEstadoCotizacionCambiado',
		'uses' => 'CotizacionController@VistaHabilitarInhabilitarMensajeEstadoCotizacionCambiado'
	));
	
	Route::get('/Cotizaciones/TodasCotizaciones', array(
		'as' => 'CotizacionesTodasCotizaciones',
		'uses' => 'CotizacionController@TodasCotizaciones'
	));
	Route::post('/Cotizaciones/TodasCotizaciones', array(
		'as' => 'CotizacionesTodasCotizaciones',
		'uses' => 'CotizacionController@TodasCotizaciones'
	));
	
	Route::get('/Cotizaciones/DetallesCotizacion', array(
		'as' => 'CotizacionesDetallesCotizacion',
		'uses' => 'CotizacionController@VistaDetallesCotizacion'
	));
	Route::post('/Cotizaciones/DetallesCotizacion', array(
		'as' => 'CotizacionesDetallesCotizacion',
		'uses' => 'CotizacionController@DetallesCotizacion'
	));
	
	
	Route::get('/OrdenesCompra/TodasOrdenesCompra', array(
		'as' => 'OrdenesDeCompraTodasOrdenesCompra',
		'uses' => 'OrdenCompraController@VistaTodasOrdenesCompra'
	));
	
	Route::get('/OrdenesCompra/DetallesOrdenCompra', array(
		'as' => 'OrdenesCompraDetallesOrdenCompra',
		'uses' => 'OrdenCompraController@VistaDetallesOrdenCompra'
	));
	Route::post('/OrdenesCompra/DetallesOrdenCompra', array(
		'as' => 'OrdenesCompraDetallesOrdenCompra',
		'uses' => 'OrdenCompraController@DetallesOrdenCompra'
	));
	
});



Route::group(array('prefix' => 'contabilidad', 'before' => 'auth'),function(){
			Route::get('/',array('as'=>'con.principal' ,'uses'=>function ()
			{

				return View::make('Menus.contabilidad');
			}));
			
			Route::resource('clasificacioncuentas','ClasificacionCuentaController');
			Route::resource('motivotransaccion', 'MotivoTransaccionsController');
			Route::resource('detalleasientos', 'DetalleAsientosController');
			Route::resource('cuentamotivos', 'CuentaMotivosController');
			Route::resource('asientocontable','AsientosController');
			//Route::resource('balanzacomprobacion','BalanzaComprobacionController');
			Route::resource('estadoresultados', 'EstadoresultadosController');
			Route::resource('balancegeneral', 'BalancegeneralsController');

			Route::resource('conceptomotivo','ConceptoMotivoController');
			Route::get('crear/conceptomotivo',array('uses'=>'ConceptoMotivoController@create'));
			Route::get('libromayor',array('uses'=>'LibroMayorController@index'));
			Route::get('librodiario',array('as'=>'con.librodiario','uses' => 'LibroDiarioController@index'));
			Route::get('crear/asientocontable',array('uses'=>'AsientosController@create'));
			Route::get('motivotransaccion',array('uses' => 'MotivoTransaccionsController@index'));
			Route::get('creando/motivotransaccion',array('uses'=>'AsientosController@creandomotivo'));
			Route::get('reembolsos',array('as'=>'con.reembolsos', 'uses'=>'ReembolsosController@index'));
			Route::get('reemblosos/registrar/{id}',array('as'=>'con.registrarReembolso','uses'=>'ReembolsosController@registrarReembolso'));

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
				Route::resource('subcuentas', 'SubcuentaController');
				Route::resource('motivoinventarios', 'MotivoInventariosController');

				Route::post('periodocontable/habilitar/{id}',array('as'=>'con.enableperiodo','uses'=>'ParamPeriodoContableController@enable'));
				Route::post('periodocontable/eliminar/{id}',array('as'=>'con.deleteperiodo','uses'=>'ParamPeriodoContableController@destroy'));
				Route::get('periodocontable/editar/{id}',array('as'=>'con.editperiodo', 'uses'=>'ParamPeriodoContableController@edit'));
				Route::get('unidadmonetaria',array('as'=>'unidadmonetaria', 'uses' => 'UnidadMonetariaController@index'));
				Route::get('periodocontable',array('as'=>'periodocontable', 'uses' => 'ParamPeriodoContableController@index'));
				Route::get('subcuentas',array ('as'=>'subcuentas', 'uses' => 'SubcuentaController@index'));


				Route::any('motivoinventarios/activar', array('as' => 'MotivoInventario.activar', 'uses' =>'MotivoInventariosController@activar'));


				//Route::post('catalogo-contable/cambiarestado', array('uses'=>'CatalogoContablesController@cambiarestado'));
			});

			Route::group(array('prefix'=>'cierreperiodo'),function(){
				Route::get('/',array('as'=>'con.cierreperiodo','uses'=>'CierrePeriodoController@index'));
				
				Route::post('ejecutar',array('as'=>'con.cierreperiodo.run', 'uses'=>'CierrePeriodoController@run'));
				Route::post('estado',array('as'=>'con.cierreperiodo.estado','uses'=>'CierrePeriodoController@retrieve'));
				Route::post('/',array('as'=>'con.cierreperiodo','uses'=>'CierrePeriodoController@index'));
				/*Route::post('mayorizacion',array('as'=>'con.mayorizar', 'uses'=>'CierrePeriodoController@mayorizar'));
				Route::post('nuevoperiodo',array('as'=>'con.nuevoperiodo','uses'=>'CierrePeriodoController@nuevoPeriodo'));
				*/
			});

			Route::group(array('prefix'=>'compras'), function(){


				Route::get('/',array('as'=>'con.compras','uses'=>'PagoComprasController@index'));
			
				Route::post('pagar',array('as'=>'con.pagarcompra','uses'=>'PagoComprasController@paid'));
			});
			Route::group(array('prefix'=>'balanzacomprobacion'),function(){

				Route::get('/',array('as'=>'con.balanza','uses'=>'BalanzaComprobacionController@index'));
				Route::post('clasifperiodos',array('as'=>'con.blclasificacion','uses'=>'BalanzaComprobacionController@clasifperiodos'));
				Route::post('tabla',array('as'=>'con.bltable','uses'=>'BalanzaComprobacionController@table'));
			});

			Route::group(array('prefix'=>'estadosfinancieros'),function(){

				Route::get('/',array('as'=>'con.estadosfinancieros','uses'=>'EstadosFinancierosController@index'));

				Route::post('periodoslist',array('as'=>'con.periodoslist','uses'=>'EstadosFinancierosController@getPeriodos'));
				Route::post('balanzacomprobacion',array('as'=>'con.balanza','uses'=>'EstadosFinancierosController@balanza'));
				Route::post('estadoresultados',array('as'=>'con.estado','uses'=>'EstadosFinancierosController@estado'));
				Route::post('balancegeneral',array('as'=>'con.balance','uses'=>'EstadosFinancierosController@balance'));
				Route::post('libromayor',array('as'=>'con.libromayor','uses'=>'EstadosFinancierosController@libromayor'));
			});

	});









//crm
Route::group(array('prefix' => 'CRM'), function(){
	Route::get('/',function(){
		return View::make('Menus.crm');
	});

	Route::resource('Empresas', 'EmpresasController');
	Route::post('Empresas/buscar', array('as' => 'CRM.Empresas.buscar', 'uses' => 'EmpresasController@buscar'));

	Route::resource('Personas', 'PersonasController');
	Route::post('Personas/buscar', array('as' => 'CRM.Personas.buscar', 'uses' => 'PersonasController@buscar'));

	Route::resource('TipoDocumentos', 'TipoDocumentosController');

	Route::resource('ValorCampoLocalCRMs', 'ValorCampoLocalCRMsController');

	Route::resource('CampoLocals', 'CRMCampoLocalsController');

});



Route::group(array('prefix' => 'Ventas', 'before' => 'auth'), function(){

	Route::get('/', function()
	{
		return View::make('Menus.ventas');
	});

	Route::resource('AperturaCajas', 'AperturaCajasController');
	Route::get('AperturaCajas/Abrir/{id}', array('as' => 'Ventas.AperturaCajas.abrir', 'uses' => 'AperturaCajasController@abrir'));

	Route::get('Listar', array('as' => 'Ventas.Listar','uses' => 'VentasController@Listar'));
	Route::get('Listar/{id}', array('as' => 'Ventas.ListarOne', 'uses' => 'VentasController@ListarOne'));

	Route::get('Devs', array('as' => 'Ventas.Devs','uses' => 'VentasController@Devs'));
	Route::get('Devs/{id}', array('as' => 'Ventas.devsOne', 'uses' => 'VentasController@devsOne'));
	
	Route::resource('Ventas', 'VentasController');
	Route::post('Ventas/guardar', array('as' => 'Ventas.Ventas.guardar','uses' => 'VentasController@guardar'));
	Route::post('Ventas/searchInvoice', array('as' => 'Ventas.Ventas.searchInvoice', 'uses' => 'VentasController@searchInvoice'));
	Route::post('Ventas/checkStock', array('as' => 'Ventas.Ventas.checkStock', 'uses' => 'VentasController@checkStock'));

	Route::resource('Descuentos', 'DescuentosController');

	Route::resource('DetalleDeVenta', 'DetalleDeVentaController');

	Route::resource('FormaPagos', 'FormaPagosController');

	Route::resource('EstadoBonos', 'EstadobonosController');

	Route::resource('BonoDeCompras', 'BonodecomprasController');
	Route::post('BonoDeCompras/validar', array('as' => 'Ventas.BonoDeCompras.validar', 'uses' => 'BonoDeComprasController@validar'));
	Route::post('BonoDeCompras/valor', array('as' => 'Ventas.BonoDeCompras.valor', 'uses' => 'BonoDeComprasController@valor'));


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







