<?php

class DetalleAsiento extends Eloquent {
	protected $guarded = array();
	protected $table ='CON_DetalleAsiento';
	protected $primaryKey='CON_DetalleAsiento_ID';

	public $timestamps=false;
	public static $rules = array(
		//'CON_DetalleAsiento_ID' => 'required',
		'CON_DetalleAsiento_Monto' => 'required|Integer',
		//'CON_DetalleAsiento_FechaCreacion' => 'required',
		//'CON_DetalleAsiento_FechaModificacion' => 'required',
		'CON_MotivoTransaccion_ID' => 'required|Integer',
		'CON_LibroDiario_ID' => 'required|Integer'
	);
}
