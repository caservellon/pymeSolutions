<?php

class SolicitudCotizacion extends Eloquent {
	protected $guarded = array();
        protected $table = 'COM_SolicitudCotizacion';

	protected $primaryKey = 'COM_SolicitudCotizacion_IdSolicitudCotizacion';
        protected $perPage = 10;
	public $timestamps = false;
	public static $rules = array(
		
		'COM_SolicitudCotizacion_Codigo' => 'max:16',
		
	);
}
