<?php

class BalanceGeneral extends Eloquent {
	protected $guarded = array();


	protected $table = 'CON_BalanceGeneral';
	protected $primaryKey = 'CON_PeriodoContable_ID';

	public $timestamps = false;

	public static $rules = array(
		'CON_PeriodoContable_ID' => 'required',
		'CON_BalanceGeneral_TotalActivosC' => 'required',
		'CON_BalanceGeneral_TotalPasivosC' => 'required',
		'CON_BalanceGeneral_TotalActivosNC' => 'required',
		'CON_BalanceGeneral_TotalPasivosNC' => 'required',
		'CON_BalanceGeneral_CapitalFinal' => 'required',
		'CON_BalanceGeneral' => 'required',
		'CON_BalanceGeneral_FechaModificacion' => 'required'
	);
}
