<?php

class LibroDiario extends Eloquent {
	

	protected $table = 'CON_LibroDiario';
	protected $primaryKey = 'CON_LibroDiario_ID';
	public $timestamps=false;
	protected $fillable = array('CON_LibroDiario_ID' ,
	'CON_LibroDiario_Observacion' ,
	'CON_LibroDiario_FechaCreacion' ,
	'CON_LibroDiario_FechaModificacion',
	'CON_LibroDiario_Monto' ,
	'CON_MotivoTransaccion_ID' ,
	'CON_LibroDiario_AsientoReversion',
	'CON_LibroDiario_Revertido' );

	public static $rules = array(
		//'CON_LibroDiario_Observacion' => 'required'
		'CON_LibroDiario_Monto' => 'required|regex:/^[0-9]{1,9}\.[0-9][0-9]$/',
		'CON_MotivoTransaccion_ID' => 'required|integer'
	);
}
