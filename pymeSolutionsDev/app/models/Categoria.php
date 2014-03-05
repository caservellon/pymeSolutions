<?php

class Categoria extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Categoria';
	protected $primaryKey = 'INV_Categoria_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Categoria_ID' => 'required',
		//'INV_Categoria_Codigo' => 'required',
		'INV_Categoria_Nombre' => 'required',
		'INV_Categoria_Descripcion' => 'required',
		'INV_Categoria_FechaCreacion' => 'required',
		'INV_Categoria_UsuarioCreacion' => 'required',
		'INV_Categoria_FechaModificacion' => 'required',
		'INV_Categoria_UsuarioModificacion' => 'required',
		//'INV_Categoria_Activo' => 'required',
		'INV_Categoria_IDCategoriaPadre' => 'required',
		'INV_Categoria_HorarioDescuento_ID' => 'required'
	);
}
