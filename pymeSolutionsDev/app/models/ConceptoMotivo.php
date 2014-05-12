<?php

class CON_ConceptoMotivo extends Eloquent {
	protected $guarded = array();
	public $timestamps=false;
	protected $table = 'CON_ConceptoMotivo';
	protected $primaryKey = 'CON_ConceptoMotivo_ID';

	public static $rules = array(
		'CON_ConceptoMotivo_Concepto' => 'required|unique:CON_ConceptoMotivo,CON_ConceptoMotivo_Concepto',
		'CON_MotivoTransaccion_ID' => 'required'
	);
}
