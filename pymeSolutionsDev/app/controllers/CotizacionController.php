<?php

class CotizacionController extends BaseController {

	public function VistaMenuCotizaciones(){
		return View::make('Menus.Cotizaciones');
	}

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
		$CantidadSeleccionadas = 0;
		
		if (Input::has('Capturar')){
			foreach ($Input as $Codigo){
					$CodigoSolicitudCotizacion = $Codigo;
					$SolicitudCotizacionSeleccionada = true;
					$CantidadSeleccionadas += 1;
			}
			
			if ($SolicitudCotizacionSeleccionada){
				if ($CantidadSeleccionadas == 1){
					if (!Helpers::CotizacionCapturada($CodigoSolicitudCotizacion)){
						return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion));
					}else{
						return Redirect::route('CotizacionesCapturarCotizacion', array('Error' => 'Ya Capturada'));
					}
				}else{
					return Redirect::route('CotizacionesCapturarCotizacion', array('Error' => 'Seleccion Multiple'));
				}
			}else{
				return Redirect::route('CotizacionesCapturarCotizacion', array('Error' => 'Sin Seleccion'));
			}
			
		}elseif (Input::has('Buscar')){
			
		}else{
			return View::make('COM_Cotizacion.CapturarCotizacion');
		}
		
	}
	
	public function CapturarCotizacionCapturar(){
		$Input = Input::except(array('_token', 'CodigoSolicitudCotizacion', 'VigenciaCotizacion'));
		//return(var_dump($Input));
		$HayErrores = false;
		
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_COT%')->get();
		$res = Cotizacion::$rules;
                
                
            foreach ($campos as $campo) {
			$val = '';
			if ($campo->GEN_CampoLocal_Requerido) {
				$val = $val.'Required|';
			}
			switch ($campo->GEN_CampoLocal_Tipo) {
				case 'TXT':
					$val = $val.'alpha_spaces|';
					break;				
				case 'INT':
					$val = $val.'Integer|';
					break;
				case 'FLOAT':
					$val = $val.'Numeric|';
					break;				
				default:
					break;
			}
			$res = array_merge($res,array($campo->GEN_CampoLocal_Codigo => $val));
                   
		}       
                
        $validation = Validator::make($Input, $res);
		
		if($validation->fails()){
			$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion))->withInput()->withErrors($validation);
		} 
		
		foreach ($Input as $Precio){
			$PrecioUnitario['COM_DetalleCotizacion_PrecioUnitario'] = $Precio;
			$Validacion = Validator::make($PrecioUnitario, COM_DetalleCotizacion::$rules, COM_DetalleCotizacion::$messages);
			
			if($Validacion->fails()){
				$HayErrores = true;
				break;
			}
		}
		
		if ($HayErrores){
			$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion))->withInput()->withErrors($Validacion);
		}
		
		$Cotizacion['COM_Cotizacion_Codigo'] = Input::get('CodigoCotizacion');
		$Cotizacion['COM_Cotizacion_Vigencia'] = Input::get('VigenciaCotizacion');
		$Validacion = Validator::make($Cotizacion, Cotizacion::$rules, Cotizacion::$messages);
		
		if($Validacion->fails()){
			$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion))->withInput()->withErrors($Validacion);
		}
		
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		
		$RegistroActualCotizacion = Cotizacion::all() -> count() + 1;
		$RegistroActualDetalleCotizacion =  COM_DetalleCotizacion::all() -> count() + 1;
		
		$Cotizacion = new Cotizacion;
		$Cotizacion -> COM_Cotizacion_Codigo = 'COM_COT_'.$RegistroActualCotizacion;
		$Cotizacion -> COM_Cotizacion_Activo = 1;
		$Cotizacion -> COM_Cotizacion_Vigencia = Input::get('VigenciaCotizacion');
		
		if (date_diff(date_create(date("Y-m-d")), date_create(date_format(date_create(Input::get('VigenciaCotizacion')), 'Y-m-d'))) -> format("%R%a") >= 0){
			$Cotizacion -> COM_Cotizacion_Vigente = 1;
		}else{
			$Cotizacion -> COM_Cotizacion_Vigente = 0;
		}
		
		$Cotizacion -> COM_Cotizacion_NumeroCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Cotizacion_FechaCreacion = date("Y-m-d");
		$Cotizacion -> COM_Cotizacion_idSolicitudCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Usuario_idUsuarioCreo = 1;
		$Cotizacion -> COM_Proveedor_idProveedor = $SolicitudCotizacion[0] -> IdProveedor;
		$Cotizacion -> save();
		
		$Total = 0;
		
		foreach($campos as $campo){
                        $valorcampolocal = new ValorCampoLocal;
                        $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo);
                        $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                        $valorcampolocal->COM_Cotizacion_IdCotizacion=$RegistroActualCotizacion;
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
                         $valorcampolocal->save();
                                
                    }
		
		reset($Input);
		
		while (is_numeric(current($Input))){
			$ProductoSolicitudCotizacion = Helpers::InformacionProductoSolicitudCotizacion(key($Input), $CodigoSolicitudCotizacion);
			
			if ($ProductoSolicitudCotizacion != Null){
			
				$DetalleCotizacion = new COM_DetalleCotizacion;
				$DetalleCotizacion -> COM_DetalleCotizacion_Codigo = 'DC' . $RegistroActualDetalleCotizacion;
				$DetalleCotizacion -> COM_DetalleCotizacion_Cantidad = $ProductoSolicitudCotizacion[0] -> Cantidad;
				$DetalleCotizacion -> COM_DetalleCotizacion_PrecioUnitario = current($Input);
				$DetalleCotizacion -> COM_DetalleCotizacion_IdCotizacion = $RegistroActualCotizacion;
				$DetalleCotizacion -> COM_Producto_Id_Producto = $ProductoSolicitudCotizacion[0] -> Id;
				$DetalleCotizacion -> COM_Usuario_idUsuarioCreo = 1;
				$DetalleCotizacion -> save();
				
				$RegistroActualDetalleCotizacion += 1;
				
				$Total += $ProductoSolicitudCotizacion[0] -> Cantidad * current($Input);
			}
				next($Input);
		}
		
		$Cotizacion -> COM_Cotizacion_Total = $Total;
		$Cotizacion -> save();
		
		return Redirect::route('CotizacionesCapturarCotizacionCapturarMensajeCotizacionCapturada');
		
	}
	
	public function TodasCotizaciones(){
		$Cotizaciones = Cotizacion::all();
	
		foreach ($Cotizaciones as $Cotizacion){
			$DiferenciaFechas = date_diff(date_create(date("Y-m-d")), date_create(date_format(date_create($Cotizacion -> COM_Cotizacion_Vigencia), 'Y-m-d'))) -> format("%R%a");
			
			if ($DiferenciaFechas < 0 && $Cotizacion -> COM_Cotizacion_Vigente == 1){
				$Cotizacion -> COM_Cotizacion_Vigente = 0;
				$Cotizacion -> save();
			}elseif ($DiferenciaFechas >= 0 && $Cotizacion -> COM_Cotizacion_Vigente == 0){
				$Cotizacion -> COM_Cotizacion_Vigente = 1;
				$Cotizacion -> save();
			}
		}
	
		return View::make('COM_Cotizacion.TodasCotizaciones');
	}
	
	public function DetallesCotizacion(){ 
		$Input = Input::except(array('_token', 'Detalle'));
		
		$CotizacionSeleccionada = False;
		$IndiceActual = 0;
		
		if (Input::has('Detalle')){
			foreach ($Input as $Codigo){
				$CodigosCotizacion[$IndiceActual] = $Codigo;
				$CotizacionSeleccionada = True;
				$IndiceActual += 1;
			}
			
			if ($CotizacionSeleccionada){
				return Redirect::route('CotizacionesDetallesCotizacion', array('CodigosCotizacion' => $CodigosCotizacion));
			}else{
				return Redirect::route('CotizacionesTodasCotizaciones', array('Error' => 'Sin Seleccion'));
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