<?php

class Horario extends Eloquent {
	protected $guarded = array();


	protected $table = 'INV_Horario';
	protected $primaryKey = 'INV_Horario_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_Horario_ID' => 'required',
		'INV_Horario_Nombre' => 'required|Alpha|Between:1,128',
		'INV_Horario_Tipo' => 'required',
		'INV_Horario_FechaInicio' => 'required',
		'INV_Horario_FechaFinal' => 'required',
		'INV_Horario_FechaCreacion' => 'required',
		'INV_Horario_UsuarioCreacion' => 'required',
		'INV_Horario_FechaModificacion' => 'required',
		'INV_Horario_UsuarioModificacion' => 'required'
	);
}
