<?php

class ClasificacionCuenta extends Eloquent {
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_ClasificacionCuenta';
	protected $primaryKey='CON_ClasificacionCuenta_ID';

	public static $rules = array(
			'CON_ClasificacionCuenta_ID' => 'required|integer',
			'CON_ClasificacionCuenta_Nombre' => 'required',
			'CON_ClasificacionCuenta_CODIGO' => 'required'
	);
}
