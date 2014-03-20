<?php

class Persona extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_Personas';
	protected $primaryKey = 'CRM_Personas_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_Personas_codigo' => 'required',
		'CRM_Personas_Nombres' => 'Required|Min:3|Max:80|alpha_spaces',
		'CRM_Personas_Apellidos' => 'Required|Min:3|Max:80|alpha_spaces',
		'CRM_Personas_Direccion' => 'Required|Min:3|Max:255|alphanumdotspaces',
		'CRM_Personas_Email' => 'Required|Between:3,64|Email',
		'CRM_Personas_Celular' => 'Required|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		//'CRM_Personas_Celular' => 'Required|Integer|digits:8|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'CRM_Personas_Fijo' => 'Required|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		//'CRM_Personas_Fijo' => 'Required|Integer|digits:8|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'CRM_Personas_Descuento' => 'required|Numeric|between:0,100|Regex:/[0-9]{1,2}(\.[0-9]{1,2})$/',
		'CRM_Personas_Foto' => ''
	);
}
