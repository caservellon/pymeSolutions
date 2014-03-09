<?php

class Proveedor extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Proveedor';
	protected $primaryKey = 'INV_Proveedor_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Proveedor_ID' => 'required',
		'INV_Proveedor_Codigo' => 'required|Alpha|Between:1,16',
		'INV_Proveedor_Nombre' => 'required|Alpha|Between:1,128',
		'INV_Proveedor_Direccion' => 'required|Alpha|Between:1,512',
		'INV_Proveedor_Telefono' => 'required',
		'INV_Proveedor_Email' => 'required|Alpha|Between:1,128',
		'INV_Proveedor_PaginaWeb' => 'required|Alpha|Between:1,128',
		'INV_Proveedor_RepresentanteVentas' => 'required|Alpha|Between:1,128',
		'INV_Proveedor_TelefonoRepresentanteVentas' => 'required',
		'INV_Proveedor_Comentarios' => 'required|Alpha|Between:1,512',
		'INV_Proveedor_RutaImagen' => 'required|Alpha|Between:1,256',
		'INV_Proveedor_FechaCreacion' => '',
		'INV_Proveedor_UsuarioCreacion' => '',
		'INV_Proveedor_FechaModificacion' => '',
		'INV_Proveedor_UsuarioModificacion' => '',
		//'INV_Proveedor_Activo' => 'required',
		//'INV_Ciudad_ID' => 'required'
		
	);
}
