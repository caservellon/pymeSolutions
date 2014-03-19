<?php

class FormaPagoVentum extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'VEN_FormaPago_id' => 'required',
		'VEN_FormaPago_Descripcion' => 'required',
		'VEN_FormaPago_TimeStamp' => 'required'
	);
}
