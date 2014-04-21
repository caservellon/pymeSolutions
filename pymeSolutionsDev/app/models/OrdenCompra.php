<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class OrdenCompra extends Eloquent {
	protected $guarded = array();
        protected $table = 'COM_OrdenCompra';
	protected $primaryKey = 'COM_OrdenCompra_IdOrdenCompra';

	public $timestamps = false;
	public static $rules = array(
		'COM_OrdenCompra_IdOrdenCompra' => 'required',
		'COM_OrdenCompra_Codigo' => 'required',
		'COM_OrdenCompra_FechaEmision' => 'required',
		'COM_OrdenCompra_FechaEntrega' => 'required',
		'COM_OrdenCompra_DireccionEntrega' => 'required',
		'COM_OrdenCompra_Activo' => 'required',
		'COM_OrdenCompra_Total' => 'required',
		'COM_OrdenCompra_FechaCreacion' => 'required',
		'COM_OrdenCompra_FechaModificacion' => 'required',
		'COM_Cotizacion_IdCotizacion' => 'required',
		'COM_Usuario_IdUsuarioCreo' => 'required',
		'COM_Proveedor_IdProveedor' => 'required',
		'Usuario_idUsuarioModifico' => 'required'
	);
}
?>
