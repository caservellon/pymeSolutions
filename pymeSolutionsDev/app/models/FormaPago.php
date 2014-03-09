<?php

class FormaPago extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_FormaPago';
	protected $primaryKey = 'INV_FormaPago_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_FormaPago_ID' => 'required',
		'INV_FormaPago_Nombre' => 'required',
		'INV_FormaPago_Efectivo' => 'required',
		'INV_FormaPago_Credito' => 'required',
		'INV_FormaPago_DiasCredito' => 'required',
		'INV_FormaPago_FechaCreacion' => 'required',
		'INV_FormaPago_UsuarioCreacion' => 'required',
		'INV_FormaPago_FechaModificacion' => 'required',
		'INV_FormaPago_UsuarioModificacion' => 'required',
		'INV_FormaPago_Activo' => 'required'
	);
}
