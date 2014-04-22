<?php

class FormaPagoVentas extends Eloquent {
	protected $guarded = array();


	protected $table = 'VEN_FormaPago';
	protected $primaryKey = 'VEN_FormaPago_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_FormaPago_id' => 'required',
		'VEN_FormaPago_Descripcion' => 'required',
		'VEN_FormaPago_TimeStamp' => 'required'
	);
}
