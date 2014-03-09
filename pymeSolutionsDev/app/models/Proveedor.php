<?php

class Proveedor extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Proveedor';
	protected $primaryKey = 'INV_Proveedor_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Proveedor_ID' => 'required',
		'INV_Proveedor_Codigo' => 'required',
		'INV_Proveedor_Nombre' => 'required',
		'INV_Proveedor_Direccion' => 'required',
		'INV_Proveedor_Telefono' => 'required',
		'INV_Proveedor_Email' => 'required',
		'INV_Proveedor_PaginaWeb' => 'required',
		'INV_Proveedor_RepresentanteVentas' => 'required',
		'INV_Proveedor_TelefonoRepresentanteVentas' => 'required',
		'INV_Proveedor_Comentarios' => 'required',
		'INV_Proveedor_RutaImagen' => 'required',
		'INV_Proveedor_FechaCreacion' => 'required',
		'INV_Proveedor_UsuarioCreacion' => 'required',
		'INV_Proveedor_FechaModificacion' => 'required',
		'INV_Proveedor_UsuarioModificacion' => 'required',
		//'INV_Proveedor_Activo' => 'required',
		//'INV_Ciudad_ID' => 'required'
		
	);
}
