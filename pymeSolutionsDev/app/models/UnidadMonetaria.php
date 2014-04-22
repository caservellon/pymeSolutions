<?php

class UnidadMonetaria extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_UnidadMonetaria';
	protected $primaryKey='CON_UnidadMonetaria_ID';

	public static $rules = array(
			//'CON_UnidadMonetaria_ID' => 'required|integer',
			'CON_UnidadMonetaria_Nombre' => 'required|max:45|alpha_spaces',
			'CON_UnidadMonetaria_TasaConversion' => 'required|regex:/^[0-9]?[0-9][0-9]\.[0-9][0-9]$/',
			'CON_UnidadMonetaria_Observacion' => 'max:255'
		);
}
