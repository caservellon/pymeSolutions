<?php

class Atributo extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Atributo';
	protected $primaryKey = 'INV_Atributo_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Atributo_ID' => 'required',
		'INV_Atributo_Codigo' => 'required',
		'INV_Atributo_Nombre' => 'required',
		'INV_Atributo_TipoDato' => 'required',
		'INV_Atributo_FechaCreacion' => 'required',
		'INV_Atributo_UsuarioCreacion' => 'required',
		'INV_Atributo_FechaModificacion' => 'required',
		'INV_Atributo_UsuarioModificacion' => 'required',
		'INV_Atributo_Activo' => 'required'
	);
}
