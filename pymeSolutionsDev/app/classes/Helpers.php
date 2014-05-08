<?php
class Helpers {

	public static function cualquierProducto(){
		$query = DB::table('INV_Producto')
			-> lists('INV_Producto_Codigo',
					 'INV_Producto_Nombre',
					 'INV_Producto_Descripcion',
					 'INV_Producto_Cantidad', 
					 'INV_Producto_PuntoReorden',
					 'INV_Producto_PrecioVenta',
					 'INV_Producto_Activo',
					 'INV_Producto_PorcentajeDescuento',
					 'INV_Producto_ID'
					);
		$arreglo = $query;
		return $arreglo;
	}
	
	public static function productoReorden(){
		$query = DB::table('INV_Producto')
			-> lists('INV_Producto_Codigo',
					 'INV_Producto_Nombre',
					 'INV_Producto_Descripcion',
					 'INV_Producto_Cantidad', 
					 'INV_Producto_PuntoReorden',
					 'INV_Producto_PrecioVenta',
					 'INV_Producto_Activo',
					 'INV_Producto_PorcentajeDescuento', 
					 'INV_Producto_ID'
					)
			-> where('INV_Producto_Cantidad', '=', 'INV_Producto_PuntoReorden'
					);
		$arreglo = $query;
		return $arreglo;
	}
	
	public static function proveedorCompras($id){
		//$query = DB::select('select INV_Proveedor_Nombre, INV_Proveedor_Codigo, INV_Proveedor_Direccion, INV_Proveedor_Email, INV_Proveedor_ID');
		$query = DB::table('INV_Proveedor')
			-> lists('INV_Proveedor_Nombre',
					 'INV_Proveedor_Codigo',
					 'INV_Proveedor_Direccion',
					 'INV_Proveedor_Email', 
					 'INV_Proveedor_ID'
					);
		$arreglo = $query;
		return $arreglo;
	}
	
	
	
	
	
	
	
	public static function InformacionSolicitudesCotizacion(){
		$query = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_SolicitudCotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_SolicitudCotizacion_FechaEmision as FechaEmision',
					  'COM_Usuario_idUsuarioCreo as IdUsuarioCreo',
					  'COM_SolicitudCotizacion_Recibido as Recibido',
					  'COM_SolicitudCotizacion_Activo as Activo'
					)
			-> orderBy('COM_SolicitudCotizacion_FechaEmision', 'desc')
			-> orderBy('COM_SolicitudCotizacion_Codigo')
			-> get();
			
		return $query;
	}
	
	public static function InformacionSolicitudCotizacion($CodigoSolicitudCotizacion){
		$query = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_SolicitudCotizacion_IdSolicitudCotizacion as IdSolicitudCotizacion',
					  'COM_SolicitudCotizacion_Codigo as Codigo',
					  'Proveedor_idProveedor as IdProveedor',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'INV_Proveedor_Direccion as DireccionProveedor',
					  'INV_Proveedor_Telefono as TelefonoProveedor',
					  'COM_SolicitudCotizacion_FechaEmision as FechaEmision',
					  'COM_SolicitudCotizacion_FechaEntrega as FechaEntrega',
					  'COM_Usuario_idUsuarioCreo as IdUsuarioCreo',
					  'COM_SolicitudCotizacion_Recibido as Recibido',
					  'COM_SolicitudCotizacion_Activo as Activo'
					)
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> get();
			
		return $query;
	}
	
	public static function InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion){
		$query = DB::table('COM_SolicitudCotizacion')
			-> join('COM_DetalleSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'SolicitudCotizacion_idSolicitudCotizacion')
			-> join('INV_Producto', 'Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'cantidad as Cantidad'
					)
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> orderBy('cantidad', 'desc')
			-> get();
			
		return $query;
	}
	
	public static function InformacionProductoSolicitudCotizacion($CodigoProducto, $CodigoSolicitudCotizacion){
		$query = DB::table('COM_SolicitudCotizacion')
			-> join('COM_DetalleSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'SolicitudCotizacion_idSolicitudCotizacion')
			-> join('INV_Producto', 'Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_ID as Id',
					  'cantidad as Cantidad')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> where('INV_Producto_Codigo', '=', $CodigoProducto)
			-> get();
			
		return $query;
	}
	
	public static function InformacionCotizaciones(){
		$query = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_Cotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_Cotizacion_FechaCreacion as FechaEmision',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'COM_Cotizacion_Activo as Activo'
					)
			-> orderBy('COM_Cotizacion_FechaEmision', 'desc')
			-> orderBy('COM_Cotizacion_Codigo')
			-> get();
			
		return $query;
	}
	
	public static function InformacionCotizacion($CodigoCotizacion){
		$query = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('INV_Proveedor_Nombre as NombreProveedor',
					  'INV_Proveedor_Direccion as DireccionProveedor',
					  'INV_Proveedor_Telefono as TelefonoProveedor',
					  'COM_Cotizacion_Total as Total',
					  'COM_Cotizacion_Vigencia as Vigencia'
					)
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> get();
			
		return $query;
	}
	
	public static function InformacionProductosCotizacion($CodigoCotizacion){
		$query = DB::table('COM_Cotizacion')
			-> join('COM_Detalle_Cotizacion', 'COM_Cotizacion_IdCotizacion', '=', 'COM_DetalleCotizacion_IdCotizacion')
			-> join('INV_Producto', 'COM_Producto_Id_Producto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleCotizacion_Cantidad as Cantidad',
					  'COM_DetalleCotizacion_PrecioUnitario as Precio'
					  )
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> orderBy('COM_DetalleCotizacion_Cantidad', 'desc')
			-> get();
			
		return $query;
	}
	
	
	public static function InformacionOrdenesCompra (){
		$query = DB::table('COM_OrdenCompra')
			-> join('INV_Proveedor', 'COM_Proveedor_IdProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_OrdenCompra_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_OrdenCompra_FechaEmision as FechaEmision'
					)
			-> orderBy('COM_OrdenCompra_FechaEmision', 'desc')
			-> orderBy('COM_OrdenCompra_Codigo')
			-> get();
			
		return $query;
	}
	
	public static function InformacionOrdenCompra ($CodigoOrdenCompra){
		$query = DB::table('COM_OrdenCompra')
			-> join('INV_Proveedor', 'COM_Proveedor_IdProveedor', '=', 'INV_Proveedor_ID')
			-> join('COM_Cotizacion', 'COM_OrdenCompra_IdCotizacion', '=', 'COM_Cotizacion_IdCotizacion')
			-> select('INV_Proveedor_Nombre as NombreProveedor',
					  'INV_Proveedor_Email as EmailProveedor',
					  'INV_Proveedor_Direccion as DireccionProveedor',
					  'INV_Proveedor_Telefono as TelefonoProveedor',
					  'COM_Cotizacion_Codigo as CodigoCotizacion',
					  'COM_Cotizacion_Total as Total',
					  'COM_OrdenCompra_FechaEmision as FechaEmision',
					  'COM_OrdenCompra_FechaEntrega as FechaEntrega',
					  'COM_OrdenCompra_DireccionEntrega as DireccionEntrega',
					  'COM_OrdenCompra_Activo as Activo'
					)
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> get();
			
		return $query;
	}
	
	public static function InformacionProductosOrdenCompra($CodigoOrdenCOmpra){
		$query = DB::table('COM_OrdenCompra')
			-> join('COM_DetalleOrdenCompra', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_DetalleOrdenCompra_idOrdenCompra')
			-> join('INV_Producto', 'COM_Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleOrdenCompra_Cantidad as Cantidad',
					  'COM_DetalleOrdenCompra_PrecioUnitario as Precio'
					  )
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCOmpra)
			-> orderBy('COM_DetalleOrdenCompra_Cantidad', 'desc')
			-> get();
			
		return $query;
	}
	
	
	public static function CotizacionCapturada($CodigoSolicitudCotizacion){
		$query = DB::table('COM_Cotizacion')
			-> join('COM_SolicitudCotizacion', 'COM_Cotizacion_idSolicitudCotizacion', '=', 'COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> select('COM_Cotizacion_IdCotizacion')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> get();
			
			if (count($query) == 0){

				return false;
			}
			
			return true;

	}
	
	
	public static function EstadoActualOrdenCompra($CodigoOrdenCompra){
		$query = DB::table('COM_OrdenCompra')
			-> join('COM_TransicionEstado', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_TransicionEstado_IdOrdenCompra')

			-> join('COM_OrdenCompra_TransicionEstado', 'COM_EstadoOrdenCompra_IdEstAct', '=', 'COM_OrdenCompra_TransicionEstado_Id')

			-> join('COM_OrdenCompra_TransicionEstado', 'COM_TransicionEstado_OrdenCompra_TransicionEstado_Id', '=', 'COM_OrdenCompra_TransicionEstado_Id')

			-> join('COM_EstadoOrdenCompra', 'COM_OrdenCompra_TransicionEstado_EstadoActual', '=', 'COM_EstadoOrdenCompra_IdEstadoOrdenCompra')
			-> select('COM_EstadoOrdenCompra_Nombre as Nombre')
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> get();
			
			return $query;
	}
}