<?php
class Helpers {

	//************************ SOLICITUDES DE COTIZACION

	public static function InformacionSolicitudesCotizacion(){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_SolicitudCotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_SolicitudCotizacion_FechaCreacion as FechaCreacion',
					  'COM_Usuario_idUsuarioCreo as IdUsuarioCreo'
					)
			-> where('COM_SolicitudCotizacion_Activo', '=', '1')
			-> where('COM_SolicitudCotizacion_Recibido', '=', '1')
			-> whereNotExists(function($Consulta){
					$Consulta
						-> select('COM_Cotizacion_idSolicitudCotizacion')
						-> from('COM_Cotizacion')
						-> whereRaw('COM_SolicitudCotizacion_IdSolicitudCotizacion = COM_Cotizacion_idSolicitudCotizacion');
				})
			-> orderBy('COM_SolicitudCotizacion_FechaCreacion', 'DESC')
			-> orderBy('COM_SolicitudCotizacion_Codigo')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionSolicitudCotizacion($CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> join('INV_FormaPago', 'COM_SolicitudCotizacion_FormaPago', '=', 'INV_FormaPago_ID')
			-> select('COM_SolicitudCotizacion_IdSolicitudCotizacion as IdSolicitudCotizacion',
					  'Proveedor_idProveedor as IdProveedor',
					  'COM_SolicitudCotizacion_FormaPago as IdFormaPago',
					  'INV_FormaPago_Nombre as FormaPago',
					  'COM_SolicitudCotizacion_CantidadPago as CantidadPagos',
					  'COM_SolicitudCotizacion_PeriodoGracia as PeriodoGracia'
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
			-> orderBy('cantidad', 'DESC')
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
	
	public static function ExisteProductoSolicitudCotizacion($CodigoProducto, $CodigoSolicitudCotizacion){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('COM_DetalleSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'SolicitudCotizacion_idSolicitudCotizacion')
			-> join('INV_Producto', 'Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_ID as Id',
					  'cantidad as Cantidad')
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
			-> where('INV_Producto_Codigo', '=', $CodigoProducto)
			-> get();
			
			if(count($Consulta) == 0){
				return false;
			}
			
			return true;
	}
	
	public static function InformacionCamposLocalesSolicitudesCotizacion(){
		$Consulta = DB::table('GEN_CampoLocal')
			-> select('GEN_CampoLocal_ID as Id',
					  'GEN_CampoLocal_Codigo as Codigo',
					  'GEN_CampoLocal_Nombre as Nombre',
					  'GEN_CampoLocal_Tipo as Tipo',
					  'GEN_CampoLocal_Requerido as Requerido'
					 )
			-> where('GEN_CampoLocal_Activo', "=", '1')
			-> where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')
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
	
	public static function InformacionCampoLocalSolicitudCotizacion($CodigoCampoLocal, $CodigoSolicitudCotizacion){
		$Consulta = DB::table('GEN_CampoLocal')
			-> join('COM_ValorCampoLocal', 'GEN_CampoLocal_ID', '=', 'COM_CampoLocal_IdCampoLocal')
			-> join('COM_SolicitudCotizacion', 'COM_ValorCampoLocal.COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'COM_SolicitudCotizacion.COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> select('COM_ValorCampoLocal_Valor as Valor')
			-> where('GEN_CampoLocal_Activo','=', '1')
			-> where('GEN_CampoLocal_Codigo', '=', $CodigoCampoLocal)
			-> where('COM_SolicitudCotizacion_Codigo', '=', $CodigoSolicitudCotizacion)
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

	public static function SolicitudCotizacionCapturada($CodigoSolicitudCotizacion){
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
	
	
	
	public static function BusquedaSolicitudesCotizacion($Busqueda){
		$Consulta = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_SolicitudCotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_SolicitudCotizacion_FechaCreacion as FechaCreacion',
					  'COM_Usuario_idUsuarioCreo as IdUsuarioCreo'
					)
			-> where('COM_SolicitudCotizacion_Activo', '=', '1')
			-> where('COM_SolicitudCotizacion_Recibido', '=', '1')
			-> whereNotExists(function($Consulta){
					$Consulta
						-> select('COM_Cotizacion_idSolicitudCotizacion')
						-> from('COM_Cotizacion')
						-> whereRaw('COM_SolicitudCotizacion_IdSolicitudCotizacion = COM_Cotizacion_idSolicitudCotizacion');
				})
			-> where(function($Consulta) use($Busqueda){
					$Consulta
						-> where('COM_SolicitudCotizacion_Codigo', 'LIKE', '%' . $Busqueda . '%')
						-> orWhere('INV_Proveedor_Nombre', 'LIKE', '%' . $Busqueda . '%')
						-> orWhere('COM_SolicitudCotizacion_FechaCreacion', 'LIKE', '%' . $Busqueda . '%')
						-> orWhere('COM_SolicitudCotizacion.COM_Usuario_idUsuarioCreo', 'LIKE', '%' . $Busqueda . '%');
				});
		
		
		$Consulta2 = DB::table('COM_SolicitudCotizacion')
			-> join('INV_Proveedor', 'Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> join('COM_ValorCampoLocal', 'COM_SolicitudCotizacion.COM_SolicitudCotizacion_IdSolicitudCotizacion', '=', 'COM_ValorCampoLocal.COM_SolicitudCotizacion_IdSolicitudCotizacion')
			-> join('GEN_CampoLocal', 'COM_CampoLocal_IdCampoLocal', '=', 'GEN_CampoLocal_ID')
			-> select('COM_SolicitudCotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_SolicitudCotizacion_FechaCreacion as FechaCreacion',
					  'COM_SolicitudCotizacion.COM_Usuario_idUsuarioCreo as IdUsuarioCreo'
					)
			-> where('COM_SolicitudCotizacion_Activo', '=', '1')
			-> where('COM_SolicitudCotizacion_Recibido', '=', '1')
			-> where('GEN_CampoLocal_Activo', '=', '1')
			-> where('GEN_CampoLocal_ParametroBusqueda', '=', '1')
			-> where('COM_ValorCampoLocal_Valor', 'LIKE', '%' . $Busqueda . '%');
			
			
		$Consulta2 = $Consulta2
			-> union($Consulta)
			-> orderBy('COM_SolicitudCotizacion_FechaCreacion', 'DESC')
			-> orderBy('COM_SolicitudCotizacion_Codigo')
			-> get();
			
		return $Consulta2;
		
	}
	
	
	
	
	//************************ COTIZACIONES
	
	public static function InformacionCotizaciones(){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_Cotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_Cotizacion_FechaCreacion as FechaCreacion',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'COM_Cotizacion_Vigente as Vigente',
					  'COM_Cotizacion_Activo as Activo'
					)
			-> orderBy('COM_Cotizacion_FechaCreacion', 'DESC')
			-> orderBy('COM_Cotizacion_Codigo')
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCotizacion($CodigoCotizacion){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('INV_FormaPago', 'COM_Cotizacion_IdFormaPago', '=', 'INV_FormaPago_ID')
			-> select('COM_Cotizacion_Total as Total',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'INV_FormaPago_Nombre as FormaPago',
					  'COM_Cotizacion_CantidadPago as CantidadPagos',
					  'COM_Cotizacion_PeriodoGracia as PeriodoGracia',
					  'COM_Cotizacion_ISV as Impuesto'
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
			-> orderBy('COM_DetalleCotizacion_Cantidad', 'DESC')
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
			-> where('GEN_CampoLocal_Activo', "=", '1')
			-> where('GEN_CampoLocal_Codigo','LIKE','COM_COT%')
			-> get();
			
		return $Consulta;
	}
	
	public static function ExistenCamposLocalesCotizaciones(){
		$Consulta = DB::table('GEN_CampoLocal')
			-> select('GEN_CampoLocal_Codigo as Codigo')
			-> where('GEN_CampoLocal_Activo', "=", '1')
			-> where('GEN_CampoLocal_Codigo','LIKE','COM_COT%')
			-> get();
			
		return $Consulta;
	}
	
	public static function ExisteCampoLocalCotizaciones($CodigoCampoLocal){
		$Consulta = DB::table('GEN_CampoLocal')
			-> select('GEN_CampoLocal_Codigo as Codigo')
			-> where('GEN_CampoLocal_Activo', "=", '1')
			-> where('GEN_CampoLocal_Codigo', '=', $CodigoCampoLocal)
			-> get();
			
		if(count($Consulta) == 0){
			return false;
		}
		
		return true;
	}
	
	public static function InformacionCampoLocalCotizacion($CodigoCampoLocal, $CodigoCotizacion){
		$Consulta = DB::table('GEN_CampoLocal')
			-> join('COM_ValorCampoLocal', 'GEN_CampoLocal_ID', '=', 'COM_CampoLocal_IdCampoLocal')
			-> join('COM_Cotizacion', 'COM_ValorCampoLocal.COM_Cotizacion_IdCotizacion', '=', 'COM_Cotizacion.COM_Cotizacion_IdCotizacion')
			-> select('COM_ValorCampoLocal_Valor as Valor')
			-> where('GEN_CampoLocal_Activo','=', '1')
			-> where('GEN_CampoLocal_Codigo', '=', $CodigoCampoLocal)
			-> where('COM_Cotizacion_Codigo', '=', $CodigoCotizacion)
			-> get();
			
		return $Consulta;
	}
	
	public static function InformacionCampoLocalListaCotizaciones($IdCampoLocalLista){
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
	
	public static function BusquedaCotizaciones($Busqueda){
		$Consulta = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_Cotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_Cotizacion_FechaCreacion as FechaCreacion',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'COM_Cotizacion_Vigente as Vigente',
					  'COM_Cotizacion_Activo as Activo'
					);
				
		if($Busqueda == 'Activa'){
			$Consulta = $Consulta
				-> where('COM_Cotizacion_Activo', '=', '1');
				
		}elseif($Busqueda == 'Inactiva'){
			$Consulta = $Consulta
				-> where('COM_Cotizacion_Activo', '=', '0');
				
		}elseif($Busqueda == 'Vigente'){
			$Consulta = $Consulta
				-> where('COM_Cotizacion_Vigente', '=', '1');
		
		}elseif($Busqueda == 'Vencida'){
			$Consulta = $Consulta
				-> where('COM_Cotizacion_Vigente', '=', '0');
				
		}else{
			$Consulta = $Consulta
				-> where('COM_Cotizacion_Codigo', 'LIKE', '%' . $Busqueda . '%')
				-> orWhere('INV_Proveedor_Nombre', 'LIKE', '%' . $Busqueda . '%')
				-> orWhere('COM_Cotizacion_FechaCreacion', 'LIKE', '%' . $Busqueda . '%')
				-> orWhere('COM_Cotizacion_Vigencia', 'LIKE', '%' . $Busqueda . '%');
		}
		
		if(in_array($Busqueda, array('Activa', 'Inactiva', 'Vigente', 'Vencida'))){
			$Consulta = $Consulta
				-> orderBy('COM_Cotizacion_FechaCreacion', 'DESC')
				-> orderBy('COM_Cotizacion_Codigo')
				-> get();
				
			return $Consulta;
		}
		
		$Consulta2 = DB::table('COM_Cotizacion')
			-> join('INV_Proveedor', 'COM_Proveedor_idProveedor', '=', 'INV_Proveedor_ID')
			-> join('COM_ValorCampoLocal', 'COM_Cotizacion.COM_Cotizacion_IdCotizacion', '=', 'COM_ValorCampoLocal.COM_Cotizacion_IdCotizacion')
			-> join('GEN_CampoLocal', 'COM_CampoLocal_IdCampoLocal', '=', 'GEN_CampoLocal_ID')
			-> select('COM_Cotizacion_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_Cotizacion_FechaCreacion as FechaCreacion',
					  'COM_Cotizacion_Vigencia as Vigencia',
					  'COM_Cotizacion_Vigente as Vigente',
					  'COM_Cotizacion_Activo as Activo'
					)
			-> where('GEN_CampoLocal_Activo', '=', '1')
			-> where('GEN_CampoLocal_ParametroBusqueda', '=', '1')
			-> where('COM_ValorCampoLocal_Valor', 'LIKE', '%' . $Busqueda . '%');
			
		$Consulta2 = $Consulta2
			-> union($Consulta)
			-> orderBy('COM_Cotizacion_FechaCreacion', 'DESC')
			-> orderBy('COM_Cotizacion_Codigo')
			-> get();
			
		return $Consulta2;
	}
	
	
	
	//************************ ORDENES DE COMPRA
	
	public static function InformacionOrdenesCompra (){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('INV_Proveedor', 'COM_Proveedor_IdProveedor', '=', 'INV_Proveedor_ID')
			-> select('COM_OrdenCompra_Codigo as Codigo',
					  'INV_Proveedor_Nombre as NombreProveedor',
					  'COM_OrdenCompra_FechaEmision as FechaEmision'
					)
			-> orderBy('COM_OrdenCompra_FechaCreacion', 'DESC')
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
			-> orderBy('COM_DetalleOrdenCompra_Cantidad', 'DESC')
			-> get();
			
		return $Consulta;
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
	
	public static function InformacionFormasPago(){
		$Consulta = DB::table('INV_FormaPago')
			-> select('INV_FormaPago_ID as IdFormaPago',
					  'INV_FormaPago_Nombre as Nombre'
					 )
			-> get();
			
			return $Consulta;
	}
	
	
	
	//************************ VALIDACIONES
	
	public static function EsAlfaEspacio($Valor){
		$EsTextoValido = false;
	
		if(preg_match('/^([a-z]|[A-Z])([a-z]|[A-Z]|\s)*([a-z]|[A-Z])$/', $Valor)){
			$EsTextoValido = true;
		}
		
		return $EsTextoValido;
	}
	
	public static function EsEntero($Valor){
		$EsEnteroValido = false;
	
		if(preg_match('/^(\+|-)?\d+$/', $Valor)){
			$EsEnteroValido = true;
		}
		
		return $EsEnteroValido;
	}
	
	public static function EsDecimal($Valor){
		$EsDecimalValido = false;
	
		if(preg_match('/^(\+|-)?\d+(\.\d+)?$/', $Valor)){
			$EsDecimalValido = true;
		}
		
		return $EsDecimalValido;
	}
	
	public static function EsDecimalMayorCero($Valor){
		$EsDecimalValido = false;
		$EsMayorCero = false;
	
		if(preg_match('/^\d+(\.\d{1,2})?$/', $Valor)){
			$EsDecimalValido = true;
			
			if($Valor > 0){
				$EsMayorCero = true;
			}
		}
		
		return $EsDecimalValido && $EsMayorCero;
	}
	
}