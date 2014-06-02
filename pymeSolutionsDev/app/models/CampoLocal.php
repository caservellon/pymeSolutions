<?php

class CampoLocal extends Eloquent {
	protected $guarded = array();

        
    protected $table = 'GEN_CampoLocal';

	protected $primaryKey = 'GEN_CampoLocal_ID';

	public $timestamps = false;

	public static $rules = array(
	    'GEN_CampoLocal_Codigo' => 'max:16',
	    'GEN_CampoLocal_Activo',
		'GEN_CampoLocal_Nombre' => 'required|max:128',
		//'GEN_CampoLocal_Tipo' => 'required|max:45',
		'GEN_CampoLocal_Requerido',
		'GEN_CampoLocal_ParametroBusqueda',
	    'GEN_CampoLocal_idUsuarioCreo',
	    'Usuario_idUsuarioModifico',
	);
}

