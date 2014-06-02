<?php

class ProductoRechazado extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_ProductoRechazado';
	protected $primaryKey = 'INV_ProductoRechazado_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_ProductoRechazado_ID' => '',
		'INV_ProductoRechazado_IDOrdenCompra' => 'required',
		'INV_ProductoRechazado_IDProducto' => 'required',
		'INV_ProductoRechazado_Cantidad' => 'required',
		'INV_ProductoRechazado_PrecioCosto' => 'required',
		'INV_ProductoRechazado_PrecioVenta' => 'required',
		'INV_ProductoRechazado_Activo' => 'required',
		'INV_ProductoRechazado_Observaciones' => '',
		'INV_ProductoRechazado_FechaCreacion' => '',
		'INV_ProductoRechazado_UsuarioCreacion' => '',
		'INV_ProductoRechazado_FechaModificacion' => '',
		'INV_ProductoRechazado_UsuarioModificacion' => ''
	);
}
