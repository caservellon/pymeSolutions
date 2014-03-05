<?php

class Ciudad extends Eloquent {
	protected $guarded = array();

	
	protected $table = 'INV_Ciudad';
	protected $primaryKey = 'INV_Ciudad_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Ciudad_ID' => 'required',
		//'INV_Ciudad_Codigo' => 'required',
		'INV_Ciudad_Nombre' => 'required',
		'INV_Ciudad_FechaCreacion' => 'required',
		'INV_Ciudad_UsuarioCreacion' => 'required',
		'INV_Ciudad_FechaModificacion' => 'required',
		'INV_Ciudad_UsuarioModificacion' => 'required',
		//'INV_Ciudad_Activo' => 'required'
	);
}
