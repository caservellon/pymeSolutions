<?php

class ProductoCampoLocal extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Producto_CampoLocal';
	protected $primaryKey = 'INV_Producto_CampoLocal_IDCampoLocal';

	public $timestamps = false;

	public static $rules = array(
		'INV_Producto_CampoLocal_IDCampoLocal',
		'INV_Producto_CampoLocal_Valor' => 'required',
		'INV_Producto_CampoLocal_FechaCreacion' => 'required',
		'INV_Producto_CampoLocal_UsuarioCreacion' => 'required',
		'INV_Producto_CampoLocal_FechaModificacion' => 'required',
		'INV_Producto_CampoLocal_UsuarioModificacion' => 'required',
		'INV_Producto_ID' => 'required',
		'GEN_CampoLocal_GEN_CampoLocal_ID' => 'required'
	);
}
