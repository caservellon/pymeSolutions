<?php

class MotivoInventario extends Eloquent {
	protected $guarded = array();

	public $timestamps = false;

	protected $table = 'CON_MotivoInventario';
	protected $primaryKey = 'CON_MotivoInventario_ID';



	public static $rules = array(
		'CON_MotivoInventario_ID' => 'required',
		'CON_MotivoTransaccion_ID' => 'required'
	);
}
