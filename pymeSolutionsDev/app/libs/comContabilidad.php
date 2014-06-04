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


	//funcion para obtener los rembolsos que estan activos para que sean registrados
public static function Reembolsos(){
	$estado= ReembolsoDevolucionCompra::where('COM_ReembosoDevolucionCompras_Activo','=',1)->get();
	return $estado;
}

// funcion para cambiar los estados tanto de la devolucion y del rembolso despues de haber registrado el rembolso
public static function CambiaEstados($id){
	$estado= ReembolsoDevolucionCompra::find($id);
	$estado->COM_ReembosoDevolucionCompras_Activo=NULL;
	$estado->update();
	$devolucion= DevolucionCompra::find($estado->COM_DevolucionCompra_COM_DevolucionCompra_ID);
	$devolucion->COM_DevolucionCompra_Activo=NULL;
	$devolucion->update();
	return null;
}


}