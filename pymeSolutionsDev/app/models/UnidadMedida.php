<?php

class UnidadMedida extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_UnidadMedida';
	protected $primaryKey = 'INV_UnidadMedida_ID';

	public $timestamps = false;
	

	public static $rules = array(
		//'INV_UnidadMedida_ID' => 'required',
		'INV_UnidadMedida_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128|unique:INV_UnidadMedida',
		'INV_UnidadMedida_Descripcion' => 'Between:1,256',
		'INV_UnidadMedida_FechaCreacion' => '',
		'INV_UnidadMedida_UsuarioCreacion' => '',
		'INV_UnidadMedida_FechaModificacion' => '',
		'INV_UnidadMedida_UsuarioModificacion' => '',
		'INV_UnidadMedida_Activo' => ''
	);

	public static $rulesUpdate = array(
		'INV_UnidadMedida_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128',
		'INV_UnidadMedida_Descripcion' => 'Between:1,256',
	);


}
