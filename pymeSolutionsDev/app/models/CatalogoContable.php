<?php

class CatalogoContable extends Eloquent {
	protected $guarded = array();
	
	public $timestamps =false;
	protected $table = 'CON_CatalogoContable';
	protected $primaryKey = 'CON_CatalogoContable_ID';

	public static $rules = array(
		//'CON_CatalogoContable_ID' => 'required',
		'CON_CatalogoContable_Codigo' => 'required|numeric|max:10',
		'CON_CatalogoContable_Nombre' => 'required|max:45|alpha',
		'CON_CatalogoContable_UsuarioCreacion' => 'required',
		//'CON_CatalogoContable_NaturalezaSaldo' => '',
		//'CON_CatalogoContable_Estado' => '',
		//'CON_CatalogoContable_FechaCreacion' => 'required',
		//'CON_CatalogoContable_FechaModificacion' => 'required',
		'CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID' => 'required'
	);
}
