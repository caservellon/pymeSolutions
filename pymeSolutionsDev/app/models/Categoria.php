<?php

class Categoria extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Categoria';
	protected $primaryKey = 'INV_Categoria_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Categoria_Codigo' => 'required',
		'INV_Categoria_Nombre' => 'required',
		'INV_Categoria_IDCategoriaPadre' => 'required|numeric',
		'INV_Categoria_HorarioDescuento_ID' => 'required|numeric'
	);
}
