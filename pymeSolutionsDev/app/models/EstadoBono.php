<?php

class EstadoBono extends Eloquent {
	protected $guarded = array();

	protected $table = 'VEN_EstadoBono';
	protected $primaryKey = 'VEN_EstadoBono_id';

	public $timestamps = false;

	public static $rules = array(
		'VEN_EstadoBono_id' => 'required',
		'VEN_EstadoBono_Codigo' => 'required',
		'VEN_EstadoBono_Nombre' => 'required',
		'VEN_EstadoBono_Descripcion' => 'required'
	);
}
