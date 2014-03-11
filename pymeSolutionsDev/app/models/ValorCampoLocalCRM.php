<?php

class ValorCampoLocalCRM extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_ValorCampoLocal';
	protected $primaryKey = 'CRM_ValorCampoLocal_ID';

	public $timestamps = false;

	public static $rules = array(
		'CRM_ValorCampoLocal_ID' => 'required',
		'CRM_ValorCampoLocal_Valor' => 'required',
		'CRM_ValorCampoLocal_Creacion' => 'required',
		'CRM_ValorCampoLocal_Modificacion' => 'required',
		'CRM_ValorCampoLocal_Usuario' => 'required',
		'GEN_CampoLocal_GEN_CampoLocal_ID' => 'required',
		'CRM_Empresas_CRM_Empresas_ID' => 'required',
		'CRM_Personas_CRM_Personas_ID' => 'required'
	);
}
