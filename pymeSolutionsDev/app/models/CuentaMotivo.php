<?php

class CuentaMotivo extends Eloquent {
	protected $guarded = array();
	protected $table= "CON_CuentaMotivo";
	Protected $primaryKey = "CON_CuentaMotivo_ID";
	public $timestamps = false;

	public static $rules = array(
		'CON_CuentaMotivo_DebeHaber' => 'required',
		'CON_MotivoTransaccion_ID' => 'required',
		'CON_CatalogoContable_ID' => 'required'
	);
}
