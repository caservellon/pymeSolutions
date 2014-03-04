<?php

class Persona extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_Personas';
	protected $primaryKey = 'CRM_Personas_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_Personas_codigo' => 'required',
		'CRM_Personas_Nombres' => 'required',
		'CRM_Personas_Apellidos' => 'required',
		'CRM_Personas_Direccion' => 'required',
		'CRM_Personas_Email' => 'required',
		'CRM_Personas_Celular' => 'required',
		'CRM_Personas_Fijo' => 'required',
		'CRM_Personas_Descuento' => 'required',
		'CRM_Personas_Foto' => 'required'
	);
}
