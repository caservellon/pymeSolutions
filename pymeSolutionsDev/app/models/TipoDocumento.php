<?php

class TipoDocumento extends Eloquent {
	protected $guarded = array();

	protected $table = 'CRM_TipoDocumento';

	protected $primaryKey = 'CRM_TipoDocumento_ID';
	public $timestamps = false;
	
	public static $rules = array(
		'CRM_TipoDocumento_Codigo' => 'required',
		'CRM_TipoDocumento_Nombre' => 'required',
		'CRM_TipoDocumento_Validacion' => 'required'
	);
}
