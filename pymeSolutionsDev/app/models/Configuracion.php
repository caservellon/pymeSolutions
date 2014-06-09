<?php

class Configuracion extends Eloquent {
	protected $guarded = array();

	protected $table = 'SEG_Config';
	protected $primaryKey = 'SEG_Config_ID';

	public $timestamps = false;

	public static $rules = array(
		'SEG_Config_NombreEmpresa' => 'required|alpha_spaces',
		'SEG_Config_Direccion' => 'required',
		'SEG_Config_Telefono' => 'required|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'SEG_Config_Telefono2' => 'regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'SEG_Config_EmailContacto' => 'email',
		'SEG_Config_EmailCompras' => 'email',
		'SEG_Config_EmailVentas' => 'email',
	);
}