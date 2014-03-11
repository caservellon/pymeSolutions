<?php

class CierreCaja extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_CierreCaja';
	protected $primaryKey = 'VEN_CierreCaja_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_CierreCaja_id' => 'required',
		'VEN_CierreCaja_TotalVentas' => 'required',
		'VEN_CierreCaja_SaldoInicial' => 'required',
		'VEN_Caja_VEN_Caja_id' => 'required',
		'VEN_AperturaCaja_VEN_AperturaCaja_id' => 'required',
		'VEN_AperturaCaja_VEN_Caja_VEN_Caja_id' => 'required'
	);
}
