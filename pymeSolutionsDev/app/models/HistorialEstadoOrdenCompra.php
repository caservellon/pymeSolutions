<?php

class HistorialEstadoOrdenCompra extends Eloquent {
	 protected $guarded = array();
	 protected $table = 'COM_TransicionEstado';
	 protected $primaryKey = 'COM_TransicionEstado_Id';
         protected $perPage = 10;

	 public $timestamps = false;
        
}
?>