<?php

class COM_DetalleCotizacion extends Eloquent{
	protected $table = 'COM_DetalleCotizacion';
	public $timestamps = false;
	public static $rules = array(
		'cantidad' => 'numeric',
		'COM_DetalleCotizacion_PrecioUnitario' => 'required | decimal'
	);
								 
	public static $messages = array(
		'COM_DetalleCotizacion_PrecioUnitario.required' => 'El Precio Unitario es requerido',
		'COM_DetalleCotizacion_PrecioUnitario.decimal' => 'El Precio Unitario debe ser un número decimal, sin signo, mayor a cero, y con un máximo de dos dígitos después del punto',
	);
}