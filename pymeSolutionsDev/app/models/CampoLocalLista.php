<?php

class CampoLocalLista extends Eloquent {
	protected $guarded = array();

    protected $table = 'GEN_CampoLocalLista';
    protected $primaryKey = 'GEN_CampoLocalLista_ID';

    public $timestamps = false;

	public static $rules = array(
		'GEN_CampoLocalLista_ID' => 'required',
		'GEN_CampoLocalLista_Valor' => 'required',
		'GEN_CampoLocal_GEN_CampoLocal_ID' => 'required'
	);
}
