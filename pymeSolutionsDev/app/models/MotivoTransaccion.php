<?php

class MotivoTransaccion extends Eloquent {
	protected $guarded = array();
	public $timestamps=false;
	protected $table = 'CON_MotivoTransaccion';
	protected $primaryKey = 'CON_MotivoTransaccion_ID';

	public static $rules = array(
		'CON_MotivoTransaccion_Codigo' => 'required',
		'CON_MotivoTransaccion_Descripcion' => 'required'
	);
}
