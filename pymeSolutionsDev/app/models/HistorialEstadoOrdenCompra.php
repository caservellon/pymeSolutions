<?php

class HistorialEstadoOrdenCompra extends Eloquent {
	 protected $guarded = array();
	 protected $table = 'COM_TransicionEstado';
	 protected $primaryKey = 'COM_TransicionEstado_Id';
         protected $perPage = 15;

	 public $timestamps = false;
        
}
?>