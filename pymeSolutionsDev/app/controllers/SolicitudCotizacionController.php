<?php

class SolicitudCotizacionController extends BaseController {
	public function NuevoCampoLocal(){
		
		$validador = Validator::make(Input::all(), GEN_CampoLocal::$reglas, GEN_CampoLocal::$mensajes);
		
		if($validador -> passes()){
			$CampoLocal = new GEN_CampoLocal;
			$CampoLocal -> GEN_CampoLocal_Nombre = Input::get('GEN_CampoLocal_Nombre');
			$CampoLocal -> GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
			
			if(Input::has('GEN_CampoLocal_Requerido')){
				//return '1';
				$CampoLocal -> GEN_CampoLocal_Requerido = '1';
			}else{
				//return '0';
				$CampoLocal -> GEN_CampoLocal_Requerido = '';
			}
			
			if(Input::has('GEN_CampoLocal_ParametroBusqueda')){
				$CampoLocal -> GEN_CampoLocal_ParametroBusqueda = '1';
			}else{
				$CampoLocal -> GEN_CampoLocal_ParametroBusqueda = '';
			}
			
			if(Input::has('GEN_CampoLocal_Activo')){
				$CampoLocal -> GEN_CampoLocal_Activo = '1';
			}else{
				$CampoLocal -> GEN_CampoLocal_Activo = '';
			}
			
			$CampoLocal -> save();
			
			return Redirect::route('ParametrizarSolicitudCotizacion') -> with('mensaje', 'Datos Guardados Exitosamente');
		}
		
		return Redirect::route('ParametrizarSolicitudCotizacion') -> withInput() -> withErrors($validador);
	}
}
