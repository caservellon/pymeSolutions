<?php

class Cotizacion extends Eloquent {
	protected $guarded = array();
        
        protected $table = 'COM_Cotizacion';
	protected $primaryKey = 'COM_Cotizacion_IdCotizacion';

	public $timestamps = false;

	public static $rules = array(
		'COM_Cotizacion_Idcotizacion' => 'required',
		'COM_Cotizacion_Codigo' => 'required',
		'COM_Cotizacion_FechaEmision' => 'required',
		'COM_Cotizacion_FechaEntrega' => 'required',
		'COM_Cotizacion_Activo' => 'required',
		'COM_Cotizacion_Total' => 'required',
		'COM_Cotizacion_Vigencia' => 'required',
		'COM_Cotizacion_NumeroCotizacion' => 'required',
		'COM_Cotizacion_FechaCreacion' => 'required',
		'COM_Cotizacion_FechaModificacion' => 'required',
		'COM_SolicitudCotizacion_idSolicitudCotizacion' => 'required',
		'COM_Usuario_idUsuarioCreo' => 'required',
		'COM_Proveedor_idProveedor' => 'required',
		'Usuario_idUsuarioModifico' => 'required'
	);
}
