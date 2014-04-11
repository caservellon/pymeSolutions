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
		//return var_dump(Input::all());
		$SolicitudCotizacionSeleccionada = False;
		
		if (Input::has('Capturar')){
			foreach (Input::all() as $input){
				if (preg_match("/^SC[[:digit:]]+/", $input)){
					$CodigoSolicitudCotizacion = $input;
					$SolicitudCotizacionSeleccionada = True;
				}
			}
			
			if ($SolicitudCotizacionSeleccionada){
				return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion));
			}
			
		}elseif (Input::has('Buscar')){
			
		}
		
	}
	
	public function CapturarCotizacionCapturar(){
		$input = Input::except(array('_token', 'CodigoSolicitudCotizacion', 'VigenciaCotizacion', 'CodigoCotizacion'));
		
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
		
		reset($input);
		
		while (is_numeric(current($input))){
			$ProductoSolicitudCotizacion = Helpers::InformacionProductoSolicitudCotizacion(key($input), $CodigoSolicitudCotizacion);
			
			$DetalleCotizacion = new COM_Detalle_Cotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Codigo = 'DC' . $RegistroActualDetalleCotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Cantidad = $ProductoSolicitudCotizacion[0] -> Cantidad;
			$DetalleCotizacion -> COM_DetalleCotizacion_PrecioUnitario = current($input);
			$DetalleCotizacion -> COM_DetalleCotizacion_IdCotizacion = $RegistroActualCotizacion;
			$DetalleCotizacion -> COM_Producto_Id_Producto = $ProductoSolicitudCotizacion[0] -> Id;
			$DetalleCotizacion -> COM_Usuario_idUsuarioCreo = 1;
			$DetalleCotizacion -> save();
			
			$RegistroActualDetalleCotizacion += 1;
			
			$Total += $ProductoSolicitudCotizacion[0] -> Cantidad * current($input);
			next($input);
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
	
	
}