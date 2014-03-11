<?php

class GEN_CampoLocal extends Eloquent {
	protected $table = 'GEN_CampoLocal';
	public $timestamps = false;
	
	public static $reglas = array('GEN_CampoLocal_Nombre' => 'required | alpha | min: 3 | max: 256',
								  'GEN_CampoLocal_Tipo'   => 'required | alpha | min: 3 | max: 45 '
								 );
								  
	public static $mensajes = array('GEN_CampoLocal_Nombre.required' => '\'Nombre\' es requerido.',
									'GEN_CampoLocal_Nombre.alpha' 	 => '\'Nombre\' sólo puede contener caracteres alfabéticos.',
									'GEN_CampoLocal_Nombre.min' 	 => '\'Nombre\' debe contener como mínimo 3 caracteres.',
									'GEN_CampoLocal_Nombre.max' 	 => '\'Nombre\' debe contener como máximo 256 caracteres.',
									
									'GEN_CampoLocal_Tipo.required' 	 => '\'Tipo\' es requerido.',
									'GEN_CampoLocal_Tipo.alpha' 	 => '\'Tipo\' sólo puede contener caracteres alfabéticos.',
									'GEN_CampoLocal_Tipo.min' 	 	 => '\'Tipo\' debe contener como mínimo 3 caracteres.',
									'GEN_CampoLocal_Tipo.max' 	 	 => '\'Tipo\' debe contener como máximo 45 caracteres.',
								   );
}