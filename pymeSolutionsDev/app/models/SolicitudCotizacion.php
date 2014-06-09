<?php

class SolicitudCotizacion extends Eloquent {
	protected $guarded = array();
        protected $table = 'COM_SolicitudCotizacion';

	protected $primaryKey = 'COM_SolicitudCotizacion_IdSolicitudCotizacion';
        protected $perPage = 3;
	public $timestamps = false;
	public static $rules = array(
		
		'COM_SolicitudCotizacion_Codigo' => 'max:16',
		'COM_SolicitudCotizacion_CantidadPago'=> 'min:1|Integer|',
                'COM_SolicitudCotizacion_PeriodoGracia'=> 'min:1|Integer|'
	);
        
}
