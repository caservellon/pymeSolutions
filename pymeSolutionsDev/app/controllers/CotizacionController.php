<?php

class CotizacionController extends BaseController {

	public function VistaCapturarCotizacion(){
		return View::make('COM_Cotizacion.CapturarCotizacion');
	}
	
	public function VistaCapturarCotizacionCapturar(){
		return View::make('COM_Cotizacion.CapturarCotizacionCapturar');
	}
	
	public function VistaCapturarCotizacionCapturarMensajeCotizacionCapturada(){
		return View::make('COM_Cotizacion.MensajeCotizacionCapturada');
	}
	
	public function VistaTodasCotizaciones(){
		return View::make('COM_Cotizacion.TodasCotizaciones');
	}
	
	public function VistaDetallesCotizacion(){
		return View::make('COM_Cotizacion.DetallesCotizacion');
	}
	
	public function VistaHabilitarInhabilitar(){
		return View::make('COM_Cotizacion.HabilitarInhabilitar');
	}
	
	public function VistaHabilitarInhabilitarMensajeEstadoCotizacionCambiado(){
		return View::make('COM_Cotizacion.MensajeEstadoCotizacionCambiado');
	}
	
	public function CapturarCotizacion(){
		$Input = Input::except(array('_token', 'Capturar'));
		
		$SolicitudCotizacionSeleccionada = false;
		
		if (Input::has('Capturar')){
			foreach ($Input as $Codigo){
					$CodigoSolicitudCotizacion = $Codigo;
					$SolicitudCotizacionSeleccionada = true;
			}
			
			if ($SolicitudCotizacionSeleccionada){
				return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion));
			}else{
				return Redirect::route('CotizacionesCapturarCotizacion');
			}
			
		}elseif (Input::has('Buscar')){
			
		}else{
			return View::make('COM_Cotizacion.CapturarCotizacion');
		}
		
	}
	
	public function CapturarCotizacionCapturar(){
		$Input = Input::except(array('_token', 'CodigoSolicitudCotizacion', 'VigenciaCotizacion', 'CodigoCotizacion'));
		
		$HayErrores = false;
		$Cont = 0;
		foreach ($Input as $Precio){
			$PrecioUnitario['COM_DetalleCotizacion_PrecioUnitario'] = $Precio;
			//echo var_dump($PrecioUnitario);
			//echo '<br>';
			$validacion = Validator::make($PrecioUnitario, COM_Detalle_Cotizacion::$rules, COM_Detalle_Cotizacion::$messages);
			
			$Cont += 1;
			if($validacion->fails()){
				//echo 'No paso <br>';
				$HayErrores = true;
				break;
			}
		}
		
		if ($HayErrores){
			$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion))->withInput()->withErrors($validacion);
		}
		
		$Cotizacion['COM_Cotizacion_Codigo'] = Input::get('CodigoCotizacion');
		$Cotizacion['COM_Cotizacion_Vigencia'] = Input::get('VigenciaCotizacion');
		$validacion = Validator::make($Cotizacion, Cotizacion::$rules, Cotizacion::$messages);
		
		if($validacion->fails()){
			$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion))->withInput()->withErrors($validacion);
		}
		
		
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		
		$RegistroActualCotizacion = Cotizacion::all() -> count() + 1;
		$RegistroActualDetalleCotizacion =  COM_Detalle_Cotizacion::all() -> count() + 1;
		
		$Cotizacion = new Cotizacion;
		$Cotizacion -> COM_Cotizacion_Codigo = Input::get('CodigoCotizacion');
		$Cotizacion -> COM_Cotizacion_Activo = 1;
		$Cotizacion -> COM_Cotizacion_Vigencia = Input::get('VigenciaCotizacion');
		$Cotizacion -> COM_Cotizacion_NumeroCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Cotizacion_FechaCreacion = date("Y-m-d");
		$Cotizacion -> COM_Cotizacion_idSolicitudCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Usuario_idUsuarioCreo = 1;
		$Cotizacion -> COM_Proveedor_idProveedor = $SolicitudCotizacion[0] -> IdProveedor;
		$Cotizacion -> save();
		
		$Total = 0;
		
		reset($Input);
		
		while (is_numeric(current($Input))){
			$ProductoSolicitudCotizacion = Helpers::InformacionProductoSolicitudCotizacion(key($Input), $CodigoSolicitudCotizacion);
			
			$DetalleCotizacion = new COM_Detalle_Cotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Codigo = 'DC' . $RegistroActualDetalleCotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Cantidad = $ProductoSolicitudCotizacion[0] -> Cantidad;
			$DetalleCotizacion -> COM_DetalleCotizacion_PrecioUnitario = current($Input);
			$DetalleCotizacion -> COM_DetalleCotizacion_IdCotizacion = $RegistroActualCotizacion;
			$DetalleCotizacion -> COM_Producto_Id_Producto = $ProductoSolicitudCotizacion[0] -> Id;
			$DetalleCotizacion -> COM_Usuario_idUsuarioCreo = 1;
			$DetalleCotizacion -> save();
			
			$RegistroActualDetalleCotizacion += 1;
			
			$Total += $ProductoSolicitudCotizacion[0] -> Cantidad * current($Input);
			next($Input);
		}
		
		$Cotizacion -> COM_Cotizacion_Total = $Total;
		$Cotizacion -> save();
		
		return Redirect::route('CotizacionesCapturarCotizacionCapturarMensajeCotizacionCapturada');
		
	}
	
	public function DetallesCotizacion(){ 
		$input = Input::except(array('_token', 'Detalle'));
		
		$CotizacionSeleccionada = False;
		
		if (Input::has('Detalle')){
			foreach ($input as $Codigo){
				$CodigoCotizacion = $Codigo;
				$CotizacionSeleccionada = True;
			}
			
			if ($CotizacionSeleccionada){
				return Redirect::route('CotizacionesDetallesCotizacion', array('CodigoCotizacion' => $CodigoCotizacion));
			}else{
				return Redirect::route('CotizacionesTodasCotizaciones');
			}
			
		}elseif (Input::has('Buscar')){
			
		}
		
	}
	
	public function HabilitarInhabilitar(){
		$Cotizaciones = Cotizacion::all();
		
		if (Input::has('Actualizar')){
			foreach ($Cotizaciones as $Cotizacion){
				if ($Cotizacion -> COM_Cotizacion_Activo){
					if (!Input::has($Cotizacion -> COM_Cotizacion_Codigo)){
						$Cotizacion -> COM_Cotizacion_Activo = 0;
						$Cotizacion -> save();
					}
				}else{
					if (Input::has($Cotizacion -> COM_Cotizacion_Codigo)){
						$Cotizacion -> COM_Cotizacion_Activo = 1;
						$Cotizacion -> save();
					}
				}	
			}
			
			return Redirect::route('CotizacionesHabilitarInhabilitarMensajeEstadoCotizacionCambiado');
			
		}elseif (Input::has('Buscar')){
			
		}
		
	}
	
	
	public function search_index(){

		//Querys de las columnas propias de Proveedor
		$Proveedor = Proveedor::where('INV_Proveedor_Nombre', '=', Input::get('search')) 
		->orWhere('INV_Proveedor_Codigo', '=', Input::get('search'))
		->orWhere('INV_Proveedor_RepresentanteVentas', '=', Input::get('search'))	
		->get();	

		//Querys de las columnas que tiene relacion con la tabla Proveedor
		$queryCiudad = DB::select('SELECT INV_Ciudad_ID FROM INV_Ciudad WHERE INV_Ciudad_Nombre = ?', array(Input::get('search')));
		$queryProducto = DB::select('SELECT INV_Proveedor_ID FROM INV_Producto_Proveedor WHERE INV_Producto_ID = (SELECT INV_Producto_ID FROM INV_Producto WHERE INV_Producto_Nombre = ?)', array(Input::get('search')));

		//Se evalua si la Query trae algo
		if(!empty($queryCiudad)){
			$temp = array();
			//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
			foreach ($queryCiudad as $qC) {
				array_push($temp, $qC->INV_Ciudad_ID);
			}
			$Proveedor = Proveedor::whereIn('INV_Ciudad_ID', $temp)->get();
		}
		
		//Se evalua si la Query trae algo
		if(!empty($queryProducto)){
			$temp = array();
			//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
			foreach ($queryProducto as $qP) {
				array_push($temp, $qP->INV_Proveedor_ID);
			}
			$Proveedor =  Proveedor::whereIn('INV_Proveedor_ID', $temp)->get();	
		}

		return View::make('Proveedor.index', compact('Proveedor'));
	}
	
}