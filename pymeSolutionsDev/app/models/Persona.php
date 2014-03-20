<?php

class Persona extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_Personas';
	protected $primaryKey = 'CRM_Personas_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_Personas_codigo' => 'required',
		'CRM_Personas_Nombres' => 'Required|Min:3|Max:80|Alpha',
		'CRM_Personas_Apellidos' => 'Required|Min:3|Max:80|Alpha',
		'CRM_Personas_Direccion' => 'Required|Min:3|Max:255|AlphaNum',
		'CRM_Personas_Email' => 'Required|Between:3,64|Email|Unique:CRM_Personas',
		'CRM_Personas_Celular' => 'Required|Integer',
		'CRM_Personas_Fijo' => 'Required|Integer',
		'CRM_Personas_Descuento' => 'required|Integer',
		'CRM_Personas_Foto' => 'required'
	);
}
