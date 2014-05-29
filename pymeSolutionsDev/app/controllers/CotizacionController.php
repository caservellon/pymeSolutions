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
		if(Input::has('Capturar')){
			if(Input::has('CodigoSolicitudCotizacion')){
				$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');

				return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion));
			
			}else{
				return Redirect::route('CotizacionesCapturarCotizacion', array('Error' => 'Sin Seleccion'));
			}
			
		}elseif(Input::has('Buscar')){
			return Redirect::route('CotizacionesCapturarCotizacion', array('Busqueda' => Input::get('Busqueda'))) -> withInput();
			
		}elseif(Input::has('Restablecer')){
			return Redirect::route('CotizacionesCapturarCotizacion');
		}
		
	}
	
	
	
	
	public function CapturarCotizacionCapturar(){
		$Input = Input::all();
		
		$Cadena = 'Cualquier';
		/*
		if(Helpers::EsAlfaEspacio($Cadena)){
			return "Es";
		}else{
			return "No es";
		}
		*/
		//return var_dump(Input::all());
		$Indice = array_keys($Input);
		$Valor = array_values($Input);
		$CodigosProducto = array();
		$PreciosProducto = array();
		
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		
		for($i = 0; $i < count($Input); $i++){
			if(Helpers::ExisteProductoSolicitudCotizacion($Indice[$i], $CodigoSolicitudCotizacion)){
				array_push($CodigosProducto, $Indice[$i]);
				array_push($PreciosProducto, $Valor[$i]);
			}
		}
		
		$Errores = array();
		$HayErrores = false;
		
		foreach($PreciosProducto as $PrecioProducto){
			if($PrecioProducto == ''){
				array_push($Errores, 'El Precio Unitario es requerido');
				$HayErrores = true;
			}elseif(!Helpers::EsDecimalMayorCero($PrecioProducto)){
				array_push($Errores, 'El Precio Unitario debe ser un número decimal, sin signo, mayor a cero, y con un máximo de dos dígitos después del punto');
				$HayErrores = true;
			}
		}
		
		if(Input::get('VigenciaCotizacion') == ''){
			array_push($Errores, 'La Fecha de Vigencia es requerida');
			$HayErrores = true;
		}
		
		if(Input::get('ImpuestoCotizacion') == ''){
			array_push($Errores, 'El Impuesto es requerido');
			$HayErrores = true;
		}elseif(!Helpers::EsDecimalMayorCero(Input::get('ImpuestoCotizacion'))){
			array_push($Errores, 'El Impuesto debe ser un número decimal, sin signo, mayor a cero, y con un máximo de dos dígitos después del punto');
			$HayErrores = true;
		}
		
		
		if(Helpers::ExistenCamposLocalesCotizaciones()){
			$CamposLocalesCotizacion = Helpers::InformacionCamposLocalesCotizaciones();
        
			$CodigosCampolocal = array();
			$ValoresCampoLocal = array();
			
			for($i = 0; $i < count($Input); $i++){
				if(Helpers::ExisteCampoLocalCotizaciones($Indice[$i])){
					array_push($CodigosCampolocal, $Indice[$i]);
					array_push($ValoresCampoLocal, $Valor[$i]);
				}
			}
			
			foreach($CamposLocalesCotizacion as $CampoLocalCotizacion){
				if(in_array($CampoLocalCotizacion -> Codigo, $CodigosCampolocal)){
					$IndiceCodigoCampoLocal = array_search($CampoLocalCotizacion -> Codigo, $CodigosCampolocal);
					
					if($ValoresCampoLocal[$IndiceCodigoCampoLocal] == ''){
						if($CampoLocalCotizacion -> Requerido){
							array_push($Errores, 'El(La) ' . $CampoLocalCotizacion -> Nombre . ' es requerido(a)');
							$HayErrores = true;
						}
					}else{
						switch($CampoLocalCotizacion -> Tipo){
							case 'TXT':
								//if(Helpers::EsAlfaEspacio($ValoresCampoLocal[$IndiceCodigoCampoLocal])){
									//array_push($Errores, 'El(La) ' . $CampoLocalCotizacion -> Nombre . ' solo puede contener letras y espacios');
									//$HayErrores = true;
								//}
							break;
							
							case 'INT':
								if(!Helpers::EsEntero($ValoresCampoLocal[$IndiceCodigoCampoLocal])){
									array_push($Errores, 'El(La) ' . $CampoLocalCotizacion -> Nombre . ' debe ser un número entero');
									$HayErrores = true;
								}
							break;
								
							case 'FLOAT':
								if(!Helpers::EsDecimal($ValoresCampoLocal[$IndiceCodigoCampoLocal])){
									array_push($Errores, 'El(La) ' . $CampoLocalCotizacion -> Nombre . ' debe ser un número decimal');
									$HayErrores = true;
								}
							break;
							
							default:
							break;
						}
					}
				}
			}  
		}
		
		if($HayErrores){
			$Errores = array_unique($Errores);
			return Redirect::route('CotizacionesCapturarCotizacionCapturar', array('CodigoSolicitudCotizacion' => $CodigoSolicitudCotizacion, 'Errores' => '1')) -> withInput() -> with('Errores', $Errores);
		}
		
		
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		
		$RegistroActualCotizacion = Cotizacion::all() -> count() + 1;
		$RegistroActualDetalleCotizacion =  COM_DetalleCotizacion::all() -> count() + 1;
		
		$Cotizacion = new Cotizacion;
		$Cotizacion -> COM_Cotizacion_Codigo = 'COM_COT_'.$RegistroActualCotizacion;
		$Cotizacion -> COM_Cotizacion_Activo = 1;
		$Cotizacion -> COM_Cotizacion_Vigencia = Input::get('VigenciaCotizacion');
		$Cotizacion -> COM_Cotizacion_IdFormaPago = $SolicitudCotizacion[0] -> IdFormaPago;
		$Cotizacion -> COM_Cotizacion_CantidadPago = $SolicitudCotizacion[0] -> CantidadPagos;
		$Cotizacion -> COM_Cotizacion_PeriodoGracia = $SolicitudCotizacion[0] -> PeriodoGracia;
		$Cotizacion -> COM_Cotizacion_ISV = Input::get('ImpuestoCotizacion');
		
		if (date_diff(date_create(date("Y-m-d G:i")), date_create(date_format(date_create(Input::get('VigenciaCotizacion')), 'Y-m-d G:i'))) -> format("%R%a") >= 0){
			$Cotizacion -> COM_Cotizacion_Vigente = 1;
		}else{
			$Cotizacion -> COM_Cotizacion_Vigente = 0;
		}
		
		$Cotizacion -> COM_Cotizacion_NumeroCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Cotizacion_FechaCreacion = date('Y-m-d G:i:s');
		$Cotizacion -> COM_Cotizacion_idSolicitudCotizacion = $SolicitudCotizacion[0] -> IdSolicitudCotizacion;
		$Cotizacion -> COM_Usuario_idUsuarioCreo = 1;
		$Cotizacion -> COM_Proveedor_idProveedor = $SolicitudCotizacion[0] -> IdProveedor;
		$Cotizacion -> save();
		
		$Total = 0;
		
		if(Helpers::ExistenCamposLocalesCotizaciones()){
			foreach($CamposLocalesCotizacion as $CampoLocalCotizacion){
				$ValorCampoLocal = new ValorCampoLocal;
				$ValorCampoLocal -> COM_ValorCampoLocal_Valor = Input::get($CampoLocalCotizacion -> Codigo);
				$ValorCampoLocal -> COM_CampoLocal_IdCampoLocal = $CampoLocalCotizacion -> Id;
				$ValorCampoLocal -> COM_Cotizacion_IdCotizacion = $RegistroActualCotizacion;
				$ValorCampoLocal -> COM_Usuario_idUsuarioCreo = 1;
				$ValorCampoLocal -> save();             
			}
		}
		
		
		for($i = 0; $i < count($CodigosProducto); $i++){
			$ProductoSolicitudCotizacion = Helpers::InformacionProductoSolicitudCotizacion($CodigosProducto[$i], $CodigoSolicitudCotizacion);
			
			$DetalleCotizacion = new COM_DetalleCotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Codigo = 'DC' . $RegistroActualDetalleCotizacion;
			$DetalleCotizacion -> COM_DetalleCotizacion_Cantidad = $ProductoSolicitudCotizacion[0] -> Cantidad;
			$DetalleCotizacion -> COM_DetalleCotizacion_PrecioUnitario = $PreciosProducto[$i];
			$DetalleCotizacion -> COM_DetalleCotizacion_IdCotizacion = $RegistroActualCotizacion;
			$DetalleCotizacion -> COM_Producto_Id_Producto = $ProductoSolicitudCotizacion[0] -> Id;
			$DetalleCotizacion -> COM_Usuario_idUsuarioCreo = 1;
			$DetalleCotizacion -> save();
			
			$RegistroActualDetalleCotizacion += 1;
			
			$Total += $ProductoSolicitudCotizacion[0] -> Cantidad * $PreciosProducto[$i];
		}
		
		$Cotizacion -> COM_Cotizacion_Total = $Total + ($Total * (Input::get('ImpuestoCotizacion') / 100));
		$Cotizacion -> save();
		
		return Redirect::route('CotizacionesCapturarCotizacionCapturarMensajeCotizacionCapturada');
	}
	
	
	
	
	public function TodasCotizaciones(){
		$Input = Input::except(array('_token', 'Detalle'));
		
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
		
		$CotizacionSeleccionada = false;
		$IndiceActual = 0;
		
		if (Input::has('Detalle')){
			foreach ($Input as $Codigo){
				$CodigosCotizacion[$IndiceActual] = $Codigo;
				$CotizacionSeleccionada = true;
				$IndiceActual += 1;
			}
			
			if ($CotizacionSeleccionada){
				return Redirect::route('CotizacionesDetallesCotizacion', array('CodigosCotizacion' => $CodigosCotizacion));
			}else{
				return Redirect::route('CotizacionesTodasCotizaciones', array('Error' => 'Sin Seleccion'));
			}
			
		}elseif (Input::has('Buscar')){
			return Redirect::route('CotizacionesTodasCotizaciones', array('Busqueda' => Input::get('Busqueda'))) -> withInput();
		
		}elseif(Input::has('Restablecer')){
			return Redirect::route('CotizacionesTodasCotizaciones');
		}
		
		return View::make('COM_Cotizacion.TodasCotizaciones');
	}
	
	
	
	
	public function HabilitarInhabilitar(){
		if (Input::has('Actualizar')){
			if(!Input::has('Busqueda')){
				$Cotizaciones = Cotizacion::all();
			}else{
				$BusquedaCotizaciones = Session::get('BusquedaCotizaciones');
				$CodigosCotizacion = array();
				
				foreach($BusquedaCotizaciones as $BusquedaCotizacion){ 
					array_push($CodigosCotizacion, $BusquedaCotizacion -> Codigo);
				}
				
				$Cotizaciones = Cotizacion::whereIn('COM_Cotizacion_Codigo', $CodigosCotizacion) -> get();
			}
				
				
			foreach($Cotizaciones as $Cotizacion){
				if($Cotizacion -> COM_Cotizacion_Activo){
					if (!Input::has($Cotizacion -> COM_Cotizacion_Codigo)){
						$Cotizacion -> COM_Cotizacion_Activo = 0;
						$Cotizacion -> save();
					}
				}else{
					if(Input::has($Cotizacion -> COM_Cotizacion_Codigo)){
						$Cotizacion -> COM_Cotizacion_Activo = 1;
						$Cotizacion -> save();
					}
				}
			}
			
			return Redirect::route('CotizacionesHabilitarInhabilitarMensajeEstadoCotizacionCambiado');
			
		}elseif(Input::has('Buscar')){
			//return Redirect::route('CotizacionesHabilitarInhabilitar', array('Busqueda' => Input::get('Busqueda'))) -> with('CotizacionesBusqueda', $CotizacionesBusqueda);
			return Redirect::route('CotizacionesHabilitarInhabilitar', array('Busqueda' => Input::get('Busqueda')));
			
		}elseif(Input::has('Restablecer')){
			return Redirect::route('CotizacionesHabilitarInhabilitar');
		}
		
	}
	/*
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
	*/
}