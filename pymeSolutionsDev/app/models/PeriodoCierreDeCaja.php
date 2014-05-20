<?php

class PeriodoCierreDeCaja extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_PeriodoCierreDeCaja';
	protected $primaryKey = 'VEN_PeriodoCierreDeCaja_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_PeriodoCierreDeCaja_Codigo' => 'required|unique:VEN_PeriodoCierreDeCaja',
		'VEN_PeriodoCierreDeCaja_ValorHoras' => 'required|integer|is_positive',
		'VEN_PeriodoCierreDeCaja_Estado' => 'required',
		'VEN_PeriodoCierreDeCaja_HoraPartida' => 'required|is_time'
	);

	public static $rulesUpdate = array(
		'VEN_PeriodoCierreDeCaja_Codigo' => 'required',
		'VEN_PeriodoCierreDeCaja_ValorHoras' => 'required|integer|is_positive',
		'VEN_PeriodoCierreDeCaja_Estado' => 'required',
		'VEN_PeriodoCierreDeCaja_HoraPartida' => 'required|is_time'
	);

}
