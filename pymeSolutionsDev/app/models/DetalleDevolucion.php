<?php

class DetalleDevolucion extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_DetalleDevolucion';
	protected $primaryKey = 'VEN_DetalleDevolucion_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_DetalleDevolucion_id' => 'required',
		'VEN_DetalleDevolucion_Cantidad' => 'required',
		'VEN_Devolucion_VEN_Devolucion_id' => 'required'
	);
}
