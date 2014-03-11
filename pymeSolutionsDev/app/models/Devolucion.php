<?php

class Devolucion extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_Devolucion';
	protected $primaryKey = 'VEN_Devolucion_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_Devolucion_id' => 'required',
		'VEN_Devolucion_Codigo' => 'required',
		'VEN_Devolucion_Monto' => 'required'
	);
}
