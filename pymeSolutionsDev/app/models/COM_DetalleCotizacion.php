<?php

class COM_Detalle_Cotizacion extends Eloquent{
	protected $table = 'COM_Detalle_Cotizacion';
	public $timestamps = false;
	public static $rules = array('cantidad' => 'numeric');
}