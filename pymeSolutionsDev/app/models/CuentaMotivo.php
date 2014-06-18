<?php

class CuentaMotivo extends Eloquent {
	protected $table= "CON_CuentaMotivo";
	Protected $primaryKey = "CON_CuentaMotivo_ID";
	public $timestamps = false;
	protected $fillable = array(
	'CON_CuentaMotivo_DebeHaber',
				'CON_MotivoTransaccion_ID',
				'CON_CatalogoContable_ID',
				'CON_CuentaMotivo_FechaCreacion',
				'CON_CuentaMotivo_FechaModificacion',
				'CON_CuentaMotivo_UsuarioCreacion',
				'CON_CuentaMotivo_UsuarioModificacion' );
	public static $rules = array(
		'CON_CuentaMotivo_DebeHaber' => 'required',
		'CON_MotivoTransaccion_ID' => 'required',
		'CON_CatalogoContable_ID' => 'required'
	);
}
