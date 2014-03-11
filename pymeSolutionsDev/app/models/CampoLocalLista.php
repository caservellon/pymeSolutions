<?php

class CampoLocalLista extends Eloquent {
	protected $guarded = array();
        
        protected $table = 'GEN_CampoLocalLista';
	protected $primaryKey = 'GEN_CampoLocalLista_ID';

	public $timestamps = false;

	public static $rules = array(
                'GEN_CampoLocalLista_Valor' => 'required|alpha_num|max:45',
         );
        
        public function campolocal(){
            return $this->hasone('CampoLocal', 'GEN_CampoLocal_IdCampoLocal');
        }
}
