<?php

class CampoLocalListum extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'GEN_CampoLocalLista_ID' => 'required',
		'GEN_CampoLocalLista_Valor' => 'required',
		'GEN_CampoLocal_GEN_CampoLocal_ID' => 'required'
	);
}
