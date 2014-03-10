<?php

class ValorCampoLocal extends Eloquent {
	protected $guarded = array();
        
        protected $table = 'COM_ValorCampoLocal';
	protected $primaryKey = 'COM_ValorCampoLocal_IdValorCampoLocal';

	public $timestamps = false;

	public static $rules = array(
		'COM_ValorCampoLocal_IdValorCampoLocal' => 'required',
		'COM_ValorCampoLocal_Valor' => 'required',
		'COM_CampoLocal_IdCampoLocal' => 'required',
		
		
	);
        
        public function campolocal(){
            return $this->hasMany('CampoLocal', 'GEN_CampoLocal_ID');
        }
}