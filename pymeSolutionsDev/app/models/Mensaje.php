<?php

class Mensaje extends Eloquent {
        protected $guarded = array();
        
        protected $table = 'GEN_Mensajes';
	protected $primaryKey = 'GEN_Mensaje_IdMensajes';

	public $timestamps = false;
}
