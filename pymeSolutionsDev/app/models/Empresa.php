<?php

class Empresa extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_Empresas';
	protected $primaryKey = 'CRM_Empresas_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_Empresas_Codigo' => 'required',
		'CRM_Empresas_Nombre' => 'required|Min:3|Max:80|alpha_spaces',
		'CRM_Empresas_Direccion' => 'required|Min:3|Max:255|alphanumdotspaces',
		'CRM_Empresas_Logo' => '',
		'CRM_Empresas_Descuento' => 'required|integer',
		'CRM_Personas_CRM_Personas_ID' => 'required'
	);
}
