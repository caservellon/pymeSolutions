<?php

class DetalleMovimiento extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_DetalleMovimiento';
	protected $primaryKey = 'INV_DetalleMovimiento_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_DetalleMovimiento_ID' => '',
		'INV_DetalleMovimiento_IDProducto' => 'required',
		'INV_DetalleMovimiento_CodigoProducto' => 'max:16',
		'INV_DetalleMovimiento_NombreProducto' => 'max:128',
		'INV_DetalleMovimiento_CantidadProducto' => 'required|Integer|min:1|max:9999999999',
		'INV_DetalleMovimiento_PrecioCosto' => '',
		'INV_DetalleMovimiento_PrecioVenta' => '',
		'INV_DetalleMovimiento_FechaCreacion' => '',
		'INV_DetalleMovimiento_UsuarioCreacion' => '',
		'INV_DetalleMovimiento_FechaModificacion' => '',
		'INV_DetalleMovimiento_UsuarioModificacion' => '',
		'INV_Movimiento_ID' => 'required',
		'INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID' => 'required',
		'INV_Producto_INV_Producto_ID' => 'required',
		'INV_Producto_INV_Categoria_ID' => 'required',
		'INV_Producto_INV_Categoria_IDCategoriaPadre' => 'required',
		'INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID' => 'required'
	);
}
