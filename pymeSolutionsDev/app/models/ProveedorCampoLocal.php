<?php

class ProveedorCampoLocal extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Proveedor_CampoLocal';
	protected $primaryKey = 'INV_Proveedor_CampoLocal_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Proveedor_CampoLocal_ID' => 'required',
		'INV_Proveedor_CampoLocal_Valor' => 'required|max:128',
		'INV_Proveedor_CampoLocal_FechaCreacion' => 'required',
		'INV_Proveedor_CampoLocal_UsuarioCreacion' => 'required',
		'INV_Proveedor_CampoLocal_FechaModificacion' => 'required',
		'INV_Proveedor_CampoLocal_UsuarioModificacion' => 'required',
		'INV_Proveedor_INV_Proveedor_ID' => 'required',
		'INV_Proveedor_INV_Ciudad_ID' => 'required',
		'GEN_CampoLocal_GEN_CampoLocal_ID' => 'required'
	);
}
