<?php

class Venta extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_Venta';
	protected $primaryKey = 'VEN_Venta_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_Venta_id' => 'required',
		'VEN_Venta_Codigo' => 'required',
		'VEN_Venta_DescuentoCliente' => 'required',
		'VEN_Venta_TotalDescuentoProductos' => 'required',
		'VEN_Venta_ISV' => 'required',
		'VEN_Venta_Subtotal' => 'required',
		'VEN_Venta_Total' => 'required',
		'VEN_Venta_TotalCambio' => 'required',
		'VEN_FormaPago_VEN_FormaPago_id' => 'required',
		'VEN_Caja_VEN_Caja_id' => 'required'
	);
}
