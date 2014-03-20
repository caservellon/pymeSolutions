<?php

class BalanzaComprobacion extends Eloquent {
	//protected $guarded = array();
	protected $table = 'CON_BalanzaComprobacion';
	protected $primaryKey = 'CON_BalanzaComprobacion_ID';
	public $timestamps=false;
	public static $rules = array(
		'CON_LibroMayor_ID' => 'required|integer'
	);
}
