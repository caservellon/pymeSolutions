<?php

class COM_Detalle_Cotizacion extends Eloquent{
	protected $table = 'COM_Detalle_Cotizacion';
	public $timestamps = false;
	public static $rules = array(
		'cantidad' => 'numeric',
		'COM_DetalleCotizacion_PrecioUnitario' => 'required | decimal'
	);
								 
	public static $messages = array(
		'COM_DetalleCotizacion_PrecioUnitario.required' => 'El Precio Unitario es requerido',
		'COM_DetalleCotizacion_PrecioUnitario.decimal' => 'El Precio Unitario debe ser un numero decimal, sin signo, mayor a cero, y con un maximo de dos digitos despues del punto',
	);
}