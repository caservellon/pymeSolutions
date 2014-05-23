<?php
class comContabilidad {
	public static function OrdenesSinPagar(){
	$sinPago=COMOrdenpago::where('COM_OrdenPago_Activo','=',1)
			//->where('COM_OrdenCompra_FechaPagar','<=',date('Y-m-d'))
			->get(array('COM_OrdenPago_IdOrdenPago',
						'COM_OrdenCompra_idOrdenCompra',
						'COM_OrdenCompra_FechaPagar',
						'COM_OrdenCompra_Monto',
						'COM_Proveedor_IdProveedor',
						'COM_OrdenCompra_FormaPago'));
	return $sinPago;
	}
	public static function cambiarAPagada($idOp){
		$orden= COMOrdenPago::find($idOp);
		$orden->COM_OrdenPago_Activo=NULL;
		$orden->update();
	}


}