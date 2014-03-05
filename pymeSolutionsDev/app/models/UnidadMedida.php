<?php

class UnidadMedida extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_UnidadMedida';
	protected $primaryKey = 'INV_UnidadMedida_ID';

	public $timestamps = false;
	

	public static $rules = array(
		//'INV_UnidadMedida_ID' => 'required',
		'INV_UnidadMedida_Nombre' => 'required',
		'INV_UnidadMedida_Descripcion' => 'required',
		'INV_UnidadMedida_FechaCreacion' => 'required',
		'INV_UnidadMedida_UsuarioCreacion' => 'required',
		'INV_UnidadMedida_FechaModificacion' => 'required',
		'INV_UnidadMedida_UsuarioModificacion' => 'required',
		//'INV_UnidadMedida_Activo' => 'required'
	);
}
