<?php

class CatalogoContable extends Eloquent {
	protected $guarded = array();
	
	public $timestamps =false;
	protected $table = 'CON_CatalogoContable';
	protected $primaryKey = 'CON_CatalogoContable_ID';


	public function Subcuentas(){
		return $this->hasMany('Subcuenta','CON_CatalogoContable_ID');
	}

	public static $rules = array(
		//'CON_CatalogoContable_ID' => 'required',
		'CON_CatalogoContable_Codigo' => 'required|numeric',
		'CON_CatalogoContable_Nombre' => 'required|max:45|alpha_spaces',
		'CON_CatalogoContable_UsuarioCreacion' => 'required',
		'CON_CatalogoContable_NaturalezaSaldo' => 'required',
		'CON_CatalogoContable_Estado' => 'required',
		//'CON_CatalogoContable_FechaCreacion' => 'required',
		//'CON_CatalogoContable_FechaModificacion' => 'required',
		'CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID' => 'required',
		'CON_CatalogoContable_CodigoSubcuenta' => 'required'
	);
}
