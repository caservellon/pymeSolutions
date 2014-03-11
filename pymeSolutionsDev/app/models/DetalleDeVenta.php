<?php

class DetalleDeVenta extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_DetalleDeVenta';
	protected $primaryKey = 'VEN_DetalleDeVenta_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_DetalleDeVenta_id' => 'required',
		'VEN_DetalleDeVenta_CantidadVendida' => 'required',
		'VEN_DetalleDeVenta_PrecioVenta' => 'required',
		'VEN_Venta_VEN_Venta_id' => 'required'
	);
}
