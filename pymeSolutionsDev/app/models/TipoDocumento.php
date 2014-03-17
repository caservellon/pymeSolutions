<?php

class TipoDocumento extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'CRM_TipoDocumento_ID' => 'required',
		'CRM_TipoDocumento_Codigo' => 'required',
		'CRM_TipoDocumento_Nombre' => 'required',
		'CRM_TipoDocumento_Validacion' => 'required'
	);
}
