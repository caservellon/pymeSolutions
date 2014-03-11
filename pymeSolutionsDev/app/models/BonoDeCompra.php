<?php

class BonoDeCompra extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_BonoDeCompra';
	protected $primaryKey = 'VEN_BonoDeCompra_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_BonoDeCompra_id' => 'required',
		'VEN_BonoDeCompra_Numero' => 'required',
		'VEN_BonoDeCompra_Valor' => 'required',
		'VEN_EstadoBono_VEN_EstadoBono_id' => 'required',
		'VEN_Devolucion_VEN_Devolucion_id' => 'required'
	);
}
