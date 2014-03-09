<?php

class CampoLocal extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'GEN_CampoLocal_ID' => 'required',
		'GEN_CampoLocal_Codigo' => 'required',
		'GEN_CampoLocal_Activo' => 'required',
		'GEN_CampoLocal_Nombre' => 'required',
		'GEN_CampoLocal_Tipo' => 'required',
		'GEN_CampoLocal_Requerido' => 'required',
		'GEN_CampoLocal_ParametroBusqueda' => 'required'
	);
}
