<?php

class Pago extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_Pago';
	protected $primaryKey = 'VEN_Pago_ID';

	public $timestamps = false;

	public static $rules = array(
		'VEN_Pago_ID' => 'required',
		'VEN_Pago_Cantidad' => 'required',
		'VEN_Venta_VEN_Venta_id' => 'required',
		'VEN_Venta_VEN_Caja_VEN_Caja_id' => 'required',
		'VEN_FormaPago_VEN_FormaPago_id' => 'required'
	);
}
