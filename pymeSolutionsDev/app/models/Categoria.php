<?php

class Categoria extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Categoria';
	protected $primaryKey = 'INV_Categoria_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Categoria_ID' => 'required',
		'INV_Categoria_Codigo' => 'alpha_num',
		'INV_Categoria_Nombre' => 'required|alpha',
		'INV_Categoria_Descripcion' => 'required',
		'INV_Categoria_FechaCreacion' => '',
		'INV_Categoria_UsuarioCreacion' => '',
		'INV_Categoria_FechaModificacion' => '',
		'INV_Categoria_UsuarioModificacion' => '',
		'INV_Categoria_Activo' => '',
		'INV_Categoria_IDCategoriaPadre' => 'required|Integer',
		'INV_Categoria_HorarioDescuento_ID' => 'required|Integer'
	);
}
