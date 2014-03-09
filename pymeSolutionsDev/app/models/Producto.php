<?php

class Producto extends Eloquent {
	protected $guarded = array();


	protected $table = 'INV_Producto';
	protected $primaryKey = 'INV_Producto_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Producto_ID' => 'required',
		'INV_Producto_Codigo' => 'required',
		'INV_Producto_Nombre' => 'required',
		'INV_Producto_Descripcion' => 'required',
		'INV_Producto_PrecioVenta' => 'required',
		'INV_Producto_MargenGanancia' => 'required',
		'INV_Producto_PrecioCosto' => 'required',
		'INV_Producto_Cantidad' => 'required',
		'INV_Producto_Impuesto1' => 'required',
		'INV_Producto_Impuesto2' => 'required',
		'INV_Producto_RutaImagen' => 'required',
		'INV_Producto_Comentarios' => 'required',
		'INV_Producto_PuntoReorden' => 'required',
		'INV_Producto_NivelReposicion' => 'required',
		'INV_Producto_TipoCodigoBarras' => 'required',
		'INV_Producto_ValorCodigoBarras' => 'required',
		'INV_Producto_ValorDescuento' => 'required',
		'INV_Producto_PorcentajeDescuento' => 'required',
		'INV_Producto_FechaCreacion' => 'required',
		'INV_Producto_UsuarioCreacion' => 'required',
		'INV_Producto_FechaModificacion' => 'required',
		'INV_Producto_UsuarioModificacion' => 'required',
		'INV_Producto_Activo' => 'required',
		'INV_Categoria_ID' => 'required',
		'INV_Categoria_IDCategoriaPadre' => 'required',
		'INV_UnidadMedida_ID' => 'required',
		'INV_HorarioBloqueo_ID' => 'required'
	);
}
