<?php

class LibroDiario extends Eloquent {
	protected $table = 'CON_Transaccion';
	protected $primaryKey = 'CON_Transaccion_ID';
	public $timestamps=false;
	public static $rules = array(
		//'CON_LibroDiario_Observacion' => 'required'
		'CON_LibroDiario_Monto' => 'required|regex:/^[0-9]+\.[0-9][0-9]$/',
		'CON_MotivoTransaccion_ID' => 'required|integer'
	);



}
