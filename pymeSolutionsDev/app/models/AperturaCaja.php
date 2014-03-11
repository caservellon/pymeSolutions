<?php

class AperturaCaja extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_AperturaCaja';
	protected $primaryKey = 'VEN_AperturaCaja_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_AperturaCaja_id' => 'required',
		'VEN_AperturaCaja_Codigo' => 'required',
		'VEN_Caja_VEN_Caja_id' => 'required'
	);
}
