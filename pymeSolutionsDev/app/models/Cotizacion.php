<?php

class Cotizacion extends Eloquent {
	protected $guarded = array();
        
    protected $table = 'COM_Cotizacion';
	protected $primaryKey = 'COM_Cotizacion_IdCotizacion';

	public $timestamps = false;

	public static $rules = array(
		'COM_Cotizacion_Vigencia' => 'required',
		'COM_Cotizacion_ISV' => 'required'
	);
	
	public static $messages = array(
		'COM_Cotizacion_Vigencia.required' => 'La Fecha de Vigencia es requerida',
		'COM_Cotizacion_ISV.required' => 'El Impuesto es requerido',
		'COM_Cotizacion_ISV.decimal' => 'El Impuesto debe ser un número decimal, sin signo, mayor a cero, y con un máximo de dos dígitos después del punto'
	);
        
        public function valorcampolocal(){
            return $this->hasMany('ValorCampoLocal', 'COM_ValorCampoLocal_IdValorCampoLocal');
        }
}
