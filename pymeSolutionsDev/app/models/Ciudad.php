<?php

class Ciudad extends Eloquent {
	protected $guarded = array();

	
	protected $table = 'INV_Ciudad';
	protected $primaryKey = 'INV_Ciudad_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Ciudad_ID' => 'required',
		'INV_Ciudad_Codigo' => 'max:3|unique:INV_Ciudad',
		'INV_Ciudad_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,64|unique:INV_Ciudad|alpha_spaces',
		'INV_Ciudad_FechaCreacion' => '',
		'INV_Ciudad_UsuarioCreacion' => '',
		'INV_Ciudad_FechaModificacion' => '',
		'INV_Ciudad_UsuarioModificacion' => '',
		//'INV_Ciudad_Activo' => 'required'
	);
}
