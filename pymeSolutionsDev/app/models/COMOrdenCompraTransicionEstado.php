<?php
    class COMOrdenCompraTransicionEstado extends Eloquent{
    	protected $guarded = array();
        protected $table= 'COM_OrdenCompra_TransicionEstado';
        protected $primaryKey = 'COM_OrdenCompra_TransicionEstado_Id';
		public $timestamps = false;
                public static $reglas= array('COM_OrdenCompra_TransicionEstado_Observacion'=>array('alpha_spaces','required','min:5'),
                                                'COM_OrdenCompra_TransicionEstado_EstadoPrevio'=>array('numeric','required'),
                                                'COM_OrdeCompra_TransicionEstado_EstadoActual'=>array('numeric'),
                                                'COM_OrdenCompra_TransicionEstado_EstadoPosterior'=>array('numeric','required'));
    }

?>
