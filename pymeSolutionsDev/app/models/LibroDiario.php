<?php

class LibroDiario extends Eloquent {
	protected $guarded = array();
	protected $table = 'CON_LibroDiario';
	protected $primaryKey = 'CON_LibroDiario_ID';
	public static $rules = array(
		//'CON_LibroDiario_Observacion' => 'required'
	);
}
