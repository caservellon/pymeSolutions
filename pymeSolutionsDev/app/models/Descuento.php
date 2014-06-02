<?php

class Descuento extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_DescuentoEspecial';
	protected $primaryKey = 'VEN_DescuentoEspecial_id';
	public $timestamps = false;

	public static $rules = array(
		//'VEN_DescuentoEspecial_id' => 'required',
		'VEN_DescuentoEspecial_Codigo' => 'required',
		'VEN_DescuentoEspecial_Nombre' => 'required',
		'VEN_DescuentoEspecial_Valor' => 'required',
		'VEN_DescuentoEspecial_FechaInicio' => 'required|HigherDate',
		'VEN_DescuentoEspecial_FechaFinal' => 'required|HigherDate',
		'VEN_DescuentoEspecial_Precedencia' => 'required|unique:VEN_DescuentoEspecial',
		'VEN_DescuentoEspecial_Estado' => 'required',
		//'VEN_DescuentoEspecial_TimeStamp' => 'required'
	);

	public static $rulesUpdate = array(
		//'VEN_DescuentoEspecial_id' => 'required',
		'VEN_DescuentoEspecial_Codigo' => 'required',
		'VEN_DescuentoEspecial_Nombre' => 'required',
		'VEN_DescuentoEspecial_Valor' => 'required',
		'VEN_DescuentoEspecial_FechaInicio' => 'required|HigherDate',
		'VEN_DescuentoEspecial_FechaFinal' => 'required|HigherDate',
		'VEN_DescuentoEspecial_Precedencia' => 'required',
		'VEN_DescuentoEspecial_Estado' => 'required',
		//'VEN_DescuentoEspecial_TimeStamp' => 'required'
	);
}
