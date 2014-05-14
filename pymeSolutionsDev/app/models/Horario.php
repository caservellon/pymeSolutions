<?php

class Horario extends Eloquent {
	protected $guarded = array();


	protected $table = 'INV_Horario';
	protected $primaryKey = 'INV_Horario_ID';

	public $timestamps = false;

	public static $rules = array(
		//'INV_Horario_ID' => 'required',
		'INV_Horario_Nombre' => 'required|regex:/^[a-z A-Z]?/|Between:1,128|unique:INV_Horario',
		'INV_Horario_Tipo' => 'required|Integer|Between:1,9999999999',
		'INV_Horario_FechaInicio' => 'required|date_format:"d/m/Y"',
		'INV_Horario_FechaFinal' => 'required|date_format:"d/m/Y"',
		'INV_Horario_FechaCreacion' => '',
		'INV_Horario_UsuarioCreacion' => '',
		'INV_Horario_FechaModificacion' => '',
		'INV_Horario_UsuarioModificacion' => ''
	);
}
