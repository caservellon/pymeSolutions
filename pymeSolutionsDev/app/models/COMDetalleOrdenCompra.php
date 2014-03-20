<?php
    class COMDetalleOrdenCompra extends Eloquent{
    	protected $guarded = array();
        protected $table= 'COM_DetalleOrdenCompra';
        protected $primaryKey = 'COM_DetalleOrdenCompra_IdDetalleOrdenCompra';
	public $timestamps = false;
        public static $reglas= array('COM_DetalleOrdenCompra_Cantidad'=>array('required'),
                                     'COM_DetalleOrdenCompra_PrecioUnitario'=>array('required')
        );
}

?>
