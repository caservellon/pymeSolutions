<?php

class Proveedor extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Proveedor';
	protected $primaryKey = 'INV_Proveedor_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Proveedor_ID' => 'required',
		'INV_Proveedor_Codigo' => 'max:16',
		'INV_Proveedor_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128',
		'INV_Proveedor_Direccion' => 'required|Between:1,512',
		'INV_Proveedor_Telefono' => 'required|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'INV_Proveedor_Email' => '', //'required|email|Between:1,128',
		'INV_Proveedor_PaginaWeb' => 'max:128',
		'INV_Proveedor_RepresentanteVentas' => 'required|Between:1,128|regex:/^[a-z A-Z]?/',
		'INV_Proveedor_TelefonoRepresentanteVentas' => 'required|regex:/^\(504\)[0-9]{4}-[0-9]{4}/',
		'INV_Proveedor_Comentarios' => 'Between:1,512',
		'INV_Proveedor_RutaImagen' => 'Between:1,256',
		'INV_Proveedor_FechaCreacion' => '',
		'INV_Proveedor_UsuarioCreacion' => '',
		'INV_Proveedor_FechaModificacion' => '',
		'INV_Proveedor_UsuarioModificacion' => '',
		//'INV_Proveedor_Activo' => 'required',
		//'INV_Ciudad_ID' => 'required'
		
	);

	public function productos (){

		return $this->belongsToMany('Producto');
	}	
}
