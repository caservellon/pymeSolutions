<?php

class FormaPago extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_FormaPago';
	protected $primaryKey = 'INV_FormaPago_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_FormaPago_ID' => 'required',
		'INV_FormaPago_Nombre' => 'required|Alpha|Between:1,128',
		'INV_FormaPago_Efectivo' => 'required',
		'INV_FormaPago_Credito' => 'required',
		'INV_FormaPago_DiasCredito' => '',
		'INV_FormaPago_FechaCreacion' => '',
		'INV_FormaPago_UsuarioCreacion' => '',
		'INV_FormaPago_FechaModificacion' => '',
		'INV_FormaPago_UsuarioModificacion' => '',
		'INV_FormaPago_Activo' => 'required'
	);
}
