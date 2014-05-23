<?php

class PagoCompras extends Eloquent {
	protected $guarded = array();

	protected $table = 'CON_Pago';
	protected $primaryKey = 'CON_Pago_ID';

	public $timestamps = false;

	public static $rules = array(
		'CON_Pago_ID' => 'required',
		'CON_Pago_PorPagar' => 'required',
	);
}
