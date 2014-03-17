<?php

class MovimientoInventario extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Movimiento';
	protected $primaryKey = 'INV_Movimiento_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Movimiento_ID' => '',
		'INV_Movimiento_Numero' => '',
		'INV_Movimiento_IDTransaccion' => '',
		'INV_Movimiento_IDOrdenCompra' => '',
		'INV_Movimiento_Observaciones' => '',
		'INV_Movimiento_FechaCreacion' => '',
		'INV_Movimiento_UsuarioCreacion' => '',
		'INV_Movimiento_FechaModificacion' => '',
		'INV_Movimiento_UsuarioModificacion' => '',
		'INV_MotivoMovimiento_INV_MotivoMovimiento_ID' => 'required'
	);
}
