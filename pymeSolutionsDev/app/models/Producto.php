<?php

class Producto extends Eloquent {
	protected $guarded = array();


	protected $table = 'INV_Producto';
	protected $primaryKey = 'INV_Producto_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Producto_ID' => 'required',
		'INV_Producto_Codigo' => '',
		'INV_Producto_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128',
		'INV_Producto_Descripcion' => 'required|regex:/^[a-z A-Z]?/|Between:1,512',
		'INV_Producto_PrecioVenta' => 'required|numeric|min:1',
		'INV_Producto_MargenGanancia' => 'required|numeric|min:1',
		'INV_Producto_PrecioCosto' => 'required|numeric|min:1',
		'INV_Producto_Cantidad' => 'required|numeric|Between:0,9999999999|min:1',
		'INV_Producto_Impuesto1' => 'numeric|Between:0,1|min:0.01|regex:/0(\.[0-9]{1,2})$/',
		'INV_Producto_Impuesto2' => 'numeric|Between:0,1|min:0.01|regex:/0(\.[0-9]{1,2})$/',
		'INV_Producto_RutaImagen' => '|Alpha|Between:1,256',
		'INV_Producto_Comentarios' => '|regex:/^[a-z A-Z]?/|Between:1,512',
		'INV_Producto_PuntoReorden' => 'required|numeric|Between:0,9999999999',
		'INV_Producto_NivelReposicion' => 'required|numeric|min:1|Between:0,9999999999',
		'INV_Producto_TipoCodigoBarras' => '',
		'INV_Producto_ValorCodigoBarras' => '',
		'INV_Producto_ValorDescuento' => 'numeric|min:0.01|regex:/[0-9]{1-19}(\.[0-9]{1,2})$/',
		'INV_Producto_PorcentajeDescuento' => 'numeric|min:0.01|regex:/[0-9]{1,2}(\.[0-9]{1,2})$/',
		'INV_Producto_FechaCreacion' => '',
		'INV_Producto_UsuarioCreacion' => '',
		'INV_Producto_FechaModificacion' => '',
		'INV_Producto_UsuarioModificacion' => '',
		'INV_Producto_Activo' => 'required',
		//'INV_Categoria_ID' => 'required',
		'INV_Categoria_IDCategoriaPadre' => 'required',
		//'INV_UnidadMedida_ID' => 'required',
		//'INV_HorarioBloqueo_ID' => 'required'
	);
}
