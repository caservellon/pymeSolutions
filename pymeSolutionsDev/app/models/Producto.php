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
		'INV_Producto_PrecioVenta' => 'required',
		'INV_Producto_MargenGanancia' => 'required',
		'INV_Producto_PrecioCosto' => 'required',
		'INV_Producto_Cantidad' => 'required',
		'INV_Producto_Impuesto1' => '',
		'INV_Producto_Impuesto2' => '',
		'INV_Producto_RutaImagen' => '|Alpha|Between:1,256',
		'INV_Producto_Comentarios' => '|regex:/^[a-z A-Z]?/|Between:1,512',
		'INV_Producto_PuntoReorden' => 'required',
		'INV_Producto_NivelReposicion' => 'required',
		'INV_Producto_TipoCodigoBarras' => '',
		'INV_Producto_ValorCodigoBarras' => '',
		'INV_Producto_ValorDescuento' => '',
		'INV_Producto_PorcentajeDescuento' => '',
		'INV_Producto_FechaCreacion' => '',
		'INV_Producto_UsuarioCreacion' => '',
		'INV_Producto_FechaModificacion' => '',
		'INV_Producto_UsuarioModificacion' => '',
		'INV_Producto_Activo' => 'required',
		//'INV_Categoria_ID' => 'required',
		//'INV_Categoria_IDCategoriaPadre' => 'required',
		//'INV_UnidadMedida_ID' => 'required',
		//'INV_HorarioBloqueo_ID' => 'required'
	);
}
