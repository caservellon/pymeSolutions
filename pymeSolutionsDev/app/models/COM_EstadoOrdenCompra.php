<?php

class COM_EstadoOrdenCompra extends Eloquent {
	 protected $guarded = array();
	 protected $table = 'COM_EstadoOrdenCompra';
	 protected $primaryKey = 'COM_EstadoOrdenCompra_IdEstadoOrdenCompra';
         protected $perPage = 3;

	 public $timestamps = false;
         public static $reglas= array('COM_EstadoOrdenCompra_Nombre'=>array('alpha_spaces','required','max:45','min:5'),
                                      'COM_EstadoOrdenCompra_Observacion'=>array('alpha_spaces','required')
                                      );
}
?>