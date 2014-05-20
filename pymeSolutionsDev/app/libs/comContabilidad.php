<?php
class comContabilidad {
	public static function OrdenesSinPagar(){
	 $contador=0;
    $return= array();
    $sinPagos = COMOrdenPago::where('COM_OrdenPago_Activo','=',1)->lists('COM_OrdenCompra_idOrdenCompra');
    $sinPagosid = COMOrdenPago::where('COM_OrdenPago_Activo','=',1)->lists('COM_OrdenPago_IdOrdenPago');
    foreach($sinPagos as $OP){
      $OC=OrdenCompra::find($OP);
        array_push($return, array('idop'=>$sinPagosid[$contador],'total'=>$OC->COM_OrdenCompra_Total,'idprov'=>$OC->COM_Proveedor_IdProveedor,'idfp'=>$OC->COM_OrdenCompra_FormaPago));
        $contador++;
    }
	return $return;
	}
	public static function cambiarAPagada($idOp){
		$orden= OrdenPagoCOMOrdenPago::find($idOP);
		$orden->COM_OrdenPago_Activo=0;
		$orden->update();
	}


}
