<?php

class Cotizacion extends Eloquent {
	protected $guarded = array();
        
    protected $table = 'COM_Cotizacion';
	protected $primaryKey = 'COM_Cotizacion_IdCotizacion';

	public $timestamps = false;

	public static $rules = array(
		//'COM_Cotizacion_Idcotizacion' => 'required',
		'COM_Cotizacion_Codigo' => 'required | unique:COM_Cotizacion',
		//'COM_Cotizacion_FechaEmision' => 'required',
		//'COM_Cotizacion_FechaEntrega' => 'required',
		//'COM_Cotizacion_Activo' => 'required',
		//'COM_Cotizacion_Total' => 'required',
		'COM_Cotizacion_Vigencia' => 'required | date',
		//'COM_Cotizacion_NumeroCotizacion' => 'required',
		//'COM_Cotizacion_FechaCreacion' => 'required',
		//'COM_SolicitudCotizacion_idSolicitudCotizacion' => 'required',
		//'COM_Usuario_idUsuarioCreo' => 'required',
		//'COM_Proveedor_idProveedor' => 'required',
		//'Usuario_idUsuarioModifico' => 'required'
	);
	
	public static $messages = array(
		'COM_Cotizacion_Codigo.required' => 'El Codigo de Cotizacion es requerido',
		'COM_Cotizacion_Codigo.unique' => 'El Codigo de Cotizacion debe ser unico',
		'COM_Cotizacion_Vigencia.required' => 'La Fecha de Vigencia es requerida',
		'COM_Cotizacion_Vigencia.date' => 'La Fecha de Vigencia debe tener un formato de fecha valido'
	);
        
        public function valorcampolocal(){
            return $this->hasMany('ValorCampoLocal', 'COM_ValorCampoLocal_IdValorCampoLocal');
        }
}
