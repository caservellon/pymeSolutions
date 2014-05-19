<?php

class Caja extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_Caja';
	protected $primaryKey = 'VEN_Caja_id';
	public $timestamps = false;

	public static $rules = array(
		'VEN_Caja_Codigo' => 'required|unique:VEN_Caja',
		'VEN_Caja_Numero' => 'required|integer|is_positive|unique:VEN_Caja',
		'VEN_Caja_Estado' => 'required',
		'VEN_Caja_SaldoInicial' => 'required'
	);

	public static $rulesUpdate = array(
		'VEN_Caja_Codigo' => 'required',
		'VEN_Caja_Numero' => 'required|integer|is_positive',
		'VEN_Caja_Estado' => 'required',
		'VEN_Caja_SaldoInicial' => 'required'
	);
}
