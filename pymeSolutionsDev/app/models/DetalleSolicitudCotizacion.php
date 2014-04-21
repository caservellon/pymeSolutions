<?php

class DetalleSolicitudCotizacion extends Eloquent {
	protected $guarded = array();

	protected $table = 'COM_DetalleSolicitudCotizacion';
	protected $primaryKey = 'idDetalleSolicitudCotizacion';

	public $timestamps = false;

	public static $rules = array(
		'cantidad' => 'requerid'
	);
        
        
}

