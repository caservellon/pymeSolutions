<?php
    class COMDetalleOrdenCompra extends Eloquent{
    	protected $guarded = array();
        protected $table= 'COM_DetalleOrdenCompra';
        protected $primaryKey = 'COM_DetalleOrdenCompra_IdDetalleOrdenCompra';
	public $timestamps = false;
        public static $reglas= array('COM_DetalleOrdenCompra_Cantidad'=>array('required','integer','min:1'),
                                     'COM_DetalleOrdenCompra_PrecioUnitario'=>array('required','num_decimal')
        );
        public static $rules = array(       'COM_OrdenCompra_FechaEntrega' => 'required',
                                            'COM_OrdenCompra_Direccion' => 'required',
                                            'COM_OrdenCompra_Total' => 'required',
                                            'COM_Proveedor_IdProveedor' => 'required',
                                            'COM_DetalleOrdenCompra_Cantidad'=>array('required','integer','min:1'),
                                            'COM_DetalleOrdenCompra_PrecioUnitario'=>array('required','num_decimal'),
                                            'COM_OrdenCompra_PeriodoGracia' => array('required','min:1','max:30','integer'),
        'COM_OrdenCompra_CantidadPago' => array('required','min:1','integer')
                                            );
}

?>
