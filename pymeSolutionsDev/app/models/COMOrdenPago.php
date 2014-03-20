<?php
    class COMOrdenPago extends Eloquent{
    	protected $guarded = array();
        protected $table= 'COM_OrdenPago';
        protected $primaryKey = 'COM_OrdenPago_IdOrdenPago';
	public $timestamps = false;        
}

?>
