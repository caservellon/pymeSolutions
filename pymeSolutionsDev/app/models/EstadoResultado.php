<?php

class EstadoResultado extends Eloquent {
	protected $guarded = array();

	protected $table = 'CON_EstadoResultado';
	protected $primaryKey = 'CON_PeriodoContable_ID';

	public $timestamps = false;

	public static $rules = array(
		'CON_PeriodoContable_ID' => 'required',
		'CON_EstadoResultados_Ingresos' => 'required',
		'CON_EstadoResultados_CostoVentas' => 'required',
		'CON_EstadoResultados_UtilidadBruta' => 'required',
		'CON_EstadoResultados_GastosdeVentas' => 'required',
		'CON_EstadoResultados_GastosAdministrativos' => 'required',
		'CON_EstadoResultados_UtilidadOperacion' => 'required',
		'CON_EstadoResultados_GastoFinanciero' => 'required',
		'CON_EstadoResultados_UtilidadAntesImpuesto' => 'required',
		'CON_EstadoResultados_Impuesto' => 'required',
		'CON_EstadoResultados_UtilidadPerdidaFinal' => 'required'
		//'CON_EstadoResultados_FechaCreacion' => 'required',
		//'CON_EstadoResultados_FechaModificacion' => 'required'
	);
}
