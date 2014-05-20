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
		$Consulta = DB::table('COM_SolicitudCotizacion')
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
			
		return $Consulta;
	}
	
	public static function InformacionSolicitudCotizacion($CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> join('INV_FormaPago', 'COM_SolicitudCotizacion_FormaPago', '=', 'INV_FormaPago_ID')
			-> select('COM_SolicitudCotizacion_IdSolicitudCotizacion as IdSolicitudCotizacion',
					  'COM_SolicitudCotizacion_Codigo as Codigo',
					  'Proveedor_idProveedor as IdProveedor',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'INV_Proveedor_Direccion as DireccionProveedor',
					  'INV_Proveedor_Telefono as TelefonoProveedor',
					  'COM_SolicitudCotizacion_FechaEmision as FechaEmision',
					  'COM_SolicitudCotizacion_FechaEntrega as FechaEntrega',
					  'INV_FormaPago_Nombre as FormaPago',
					  'COM_Usuario_idUsuarioCreo as IdUsuarioCreo',
					  'COM_SolicitudCotizacion_Recibido as Recibido',
					  'COM_SolicitudCotizacion_Activo as Activo'
					)
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('COM_DetalleSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'SolicitudCotizacion_idSolicitudCotizacion')
			-> join('INV_Producto', 'Producto_idProducto', '=', 'INV_Producto_ID')
			-> join('INV_UnidadMedida', 'INV_Producto.INV_UnidadMedida_ID', '=', 'INV_UnidadMedida.INV_UnidadMedida_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'cantidad as Cantidad',
					  'INV_UnidadMedida_Nombre as Unidad'
					)
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> orderBy('cantidad', 'desc')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionProductoSolicitudCotizacion($CodigoProducto, $CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('COM_DetalleSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'SolicitudCotizacion_idSolicitudCotizacion')
			-> join('INV_Producto', 'Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_ID as Id',
					  'cantidad as Cantidad')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> where('INV_Producto_Codigo', '=', $CodigoProducto)
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCamposLocalesSolicitudCotizacion($CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('COM_ValorCampoLocal', 'COM_SolicitudCotizacion.COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'COM_ValorCampoLocal.COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> join('GEN_CampoLocal', 'COM_ValorCampoLocal.COM_CampoLocal_IdCampoLocal', '=', 'GEN_CampoLocal_ID')
			-> select('GEN_CampoLocal_Nombre as Nombre',
					  'COM_ValorCampoLocal_Valor as Valor')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> where('GEN_CampoLocal_Activo', '=', 1)
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCotizaciones(){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_Cotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_Cotizacion_FechaCreacion as FechaEmision',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'COM_Cotizacion_Vigente as Vigente',
					  'COM_Cotizacion_Activo as Activo'
					)
			-> orderBy('COM_Cotizacion_FechaEmision', 'desc')
			-> orderBy('COM_Cotizacion_Codigo')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCotizacion($CodigoCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> join('INV_FormaPago', 'COM_Cotizacion_IdFormaPago', '=', 'INV_FormaPago_ID')
			-> select('INV_Proveedor_Nombre as NombreProveedor',
					  'INV_Proveedor_Direccion as DireccionProveedor',
					  'INV_Proveedor_Telefono as TelefonoProveedor',
					  'COM_Cotizacion_Total as Total',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'INV_FormaPago_Nombre as FormaPago'
					)
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionProductosCotizacion($CodigoCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('COM_DetalleCotizacion', 'COM_Cotizacion_IdCotizacion', '=', 'COM_DetalleCotizacion_IdCotizacion')
			-> join('INV_Producto', 'COM_Producto_Id_Producto', '=', 'INV_Producto_ID')
			-> join('INV_UnidadMedida', 'INV_Producto.INV_UnidadMedida_ID', '=', 'INV_UnidadMedida.INV_UnidadMedida_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleCotizacion_Cantidad as Cantidad',
					  'INV_UnidadMedida_Nombre as Unidad',
					  'COM_DetalleCotizacion_PrecioUnitario as Precio'
					  )
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> orderBy('COM_DetalleCotizacion_Cantidad', 'desc')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCamposLocalesCotizaciones(){
		$Consulta = DB::table('GEN_CampoLocal')
			-> select('GEN_CampoLocal_ID as Id',
					  'GEN_CampoLocal_Codigo as Codigo',
					  'GEN_CampoLocal_Nombre as Nombre',
					  'GEN_CampoLocal_Tipo as Tipo',
					  'GEN_CampoLocal_Requerido as Requerido'
					 )
			-> where('GEN_CampoLocal_Activo',"=",1)
			-> where('GEN_CampoLocal_Codigo','LIKE','COM_COT%')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCampoLocalCotizacion($CodigoCampoLocal, $CodigoCotizacion){
		$Consulta = DB::table('GEN_CampoLocal')
			-> join('COM_ValorCampoLocal', 'GEN_CampoLocal_ID', '=', 'COM_CampoLocal_IdCampoLocal')
			-> join('COM_Cotizacion', 'COM_ValorCampoLocal.COM_Cotizacion_IdCotizacion', '=', 'COM_Cotizacion.COM_Cotizacion_IdCotizacion')
			-> select('COM_ValorCampoLocal_Valor as Valor')
			-> where('GEN_CampoLocal_Activo',"=",1)
			-> where('GEN_CampoLocal_Codigo', '=', $CodigoCampoLocal)
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> get();
			
		return $Consulta;
	}
	
	public static function ValoresCampoLocalListaCotizacion($IdCampoLocalLista){
		$Consulta = DB::table('GEN_CampoLocalLista')
			-> select('GEN_CampoLocalLista_Valor as Valor')
			-> where('GEN_CampoLocal_GEN_CampoLocal_ID', "=", $IdCampoLocalLista)
			-> get();
			
		return $Consulta;
	}
	
	public static function TieneCamposLocalesCotizacion($CodigoCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('COM_ValorCampoLocal', 'COM_Cotizacion.COM_Cotizacion_IdCotizacion', '=', 'COM_ValorCampoLocal.COM_Cotizacion_IdCotizacion')
			-> select()
			-> where('COM_Cotizacion.COM_Cotizacion_Codigo', "=", $CodigoCotizacion)
			-> get();

		if(count($Consulta) == 0){
			return false;
		}
		
		return true;
	}
	
	public static function InformacionOrdenesCompra (){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('INV_Proveedor', 'COM_Proveedor_IdProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_OrdenCompra_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_OrdenCompra_FechaEmision as FechaEmision'
					)
			-> orderBy('COM_OrdenCompra_FechaEmision', 'desc')
			-> orderBy('COM_OrdenCompra_Codigo')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionOrdenCompra ($CodigoOrdenCompra){
		$Consulta = DB::table('COM_OrdenCompra')
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
			
		return $Consulta;
	}
	
	public static function InformacionProductosOrdenCompra($CodigoOrdenCompra){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('COM_DetalleOrdenCompra', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_DetalleOrdenCompra_idOrdenCompra')
			-> join('INV_Producto', 'COM_Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleOrdenCompra_Cantidad as Cantidad',
					  'COM_DetalleOrdenCompra_PrecioUnitario as Precio'
					  )
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> orderBy('COM_DetalleOrdenCompra_Cantidad', 'desc')
			-> get();
			
		return $Consulta;
	}
	
	public static function CotizacionCapturada($CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('COM_SolicitudCotizacion', 'COM_Cotizacion_idSolicitudCotizacion', '=', 'COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> select('COM_Cotizacion_IdCotizacion')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> get();
			
		if (count($Consulta) == 0){
			return false;
		}
			
		return true;
	}
	
	public static function EstadoActualOrdenCompra($CodigoOrdenCompra){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('COM_TransicionEstado', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_TransicionEstado_IdOrdenCompra')
			-> join('COM_OrdenCompra_TransicionEstado', 'COM_EstadoOrdenCompra_IdEstAct', '=', 'COM_OrdenCompra_TransicionEstado_Id')
			-> join('COM_EstadoOrdenCompra', 'COM_OrdenCompra_TransicionEstado_EstadoActual', '=', 'COM_EstadoOrdenCompra_IdEstadoOrdenCompra')
			-> select('COM_EstadoOrdenCompra_Nombre as Nombre')
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> get();
			
			return $Consulta;
	}
	
	public static function InformacionSolicitudCotizacionDeCotizacion($CodigoCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('COM_SolicitudCotizacion', 'COM_Cotizacion_idSolicitudCotizacion', '=', 'COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> select('COM_SolicitudCotizacion_Codigo as Codigo')
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> get();
			
			return $Consulta;
	}
	
	public static function InformacionFormasPago(){
		$Consulta = DB::table('INV_FormaPago')
			-> select('INV_FormaPago_ID',
					  'INV_FormaPago_Nombre as Nombre'
					 )
			-> get();
			
			return $Consulta;
	}
}