<?php

class SolicitudCotizacionController extends BaseController {
	public function NuevoCampoLocal(){
		$input = Input::all();
		
		$validador = Validator::make($input, GEN_CampoLocal::$reglas, GEN_CampoLocal::$mensajes);
		
		if($validador -> passes()){
			$CampoLocal = new GEN_CampoLocal;
			$CampoLocal -> GEN_CampoLocal_Nombre = Input::get('GEN_CampoLocal_Nombre');
			$CampoLocal -> GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
			
			$CampoLocal -> save();
			return Redirect::route('ParametrizarSolicitudCotizacion') -> with('mensaje', 'Datos Guardados Exitosamente');
		}
		
		return Redirect::route('ParametrizarSolicitudCotizacion') -> withInput() -> withErrors($validador);
	}
}
