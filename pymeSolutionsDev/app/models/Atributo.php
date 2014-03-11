<?php

class Atributo extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_Atributo';
	protected $primaryKey = 'INV_Atributo_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Atributo_Codigo' => 'required',
		'INV_Atributo_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128',
		'INV_Atributo_TipoDato' => 'required|Alpha|Between:1,64',
		'INV_Atributo_FechaCreacion' => '',
		'INV_Atributo_UsuarioCreacion' => '',
		'INV_Atributo_FechaModificacion' => '',
		'INV_Atributo_UsuarioModificacion' => '',
		//'INV_Atributo_Activo' => 'required'
	);
}
