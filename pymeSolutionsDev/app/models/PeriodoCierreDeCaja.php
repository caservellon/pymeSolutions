<?php

class PeriodoCierreDeCaja extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'VEN_PeriodoCierreDeCaja_id' => 'required',
		'VEN_PeriodoCierreDeCaja_Codigo' => 'required',
		'VEN_PeriodoCierreDeCaja_ValorHoras' => 'required',
		'VEN_PeriodoCierreDeCaja_Estado' => 'required',
		'VEN_PeriodoCierreDeCaja_HoraPartida' => 'required'
	);
}
