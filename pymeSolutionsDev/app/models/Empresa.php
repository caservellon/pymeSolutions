<?php

class Empresa extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_Empresas';
	protected $primaryKey = 'CRM_Empresas_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_Empresas_ID' => 'required',
		'CRM_Empresas_Codigo' => 'required',
		'CRM_Empresas_Nombre' => 'required',
		'CRM_Empresas_Direccion' => 'required',
		'CRM_Empresas_Logo' => 'required',
		'CRM_Empresas_Descuento' => 'required',
		'CRM_Personas_CRM_Personas_ID' => 'required'
	);
}
