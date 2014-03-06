<?php

class PeriodoContable extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_PeriodoContable';
	protected $primaryKey='CON_PeriodoContable_ID';

	public static $rules = array(
			//'CON_PeriodoContable_ID' => 'required|integer',
			'CON_PeriodoContable_Nombre' => 'required|max:45|alpha',
			'CON_PeriodoContable_FechaInicio' => 'required|date_format:yyyy-mm-dd',
			'CON_PeriodoContable_FechaFinal' => 'required|date_format:yyyy-mm-dd'

		);
}
