<?php

class CatalogoContable extends Eloquent {
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_CatalogoContable';
	protected $primaryKey='CON_CatalogoContable_ID';

	public static $rules = array(
			'CON_CatalogoContable_ID' => 'required|integer',
			'CON_CatalogoContable_Nombre' => 'required',
			'CON_CatalogoContable_Codigo' => 'required',
			'CON_CatalogoContable_NaturalezaSaldo' => 'required|BIT',
			'CON_CatalogoContable_Estado' => 'required|BIT',
			'CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID' => 'required|integer'
	);
}
