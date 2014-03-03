<?php

class UnidadMonetaria extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_UnidadMonetaria';
	protected $primaryKey='CON_UnidadMonetaria_ID';

	public static $rules = array(
			'CON_UnidadMonetaria_ID' => 'required|integer',
			'CON_UnidadMonetaria_Nombre' => 'required',
			'CON_UnidadMonetaria_TasaConversion' => 'required|numeric'

		);
}
