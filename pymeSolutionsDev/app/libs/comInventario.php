<?php
class comInventario {
	public static function getOrdenes(){
		$idOrdenes = HistorialEstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstAct','=','9')->where('COM_TransicionEstado_Activo','=',1)->lists('COM_TransicionEstado_IdOrdenCompra');
		$codOrdenes = array();
		if ($idOrdenes)
			$codOrdenes=OrdenCompra::wherein('COM_OrdenCompra_IdOrdenCompra',$idOrdenes)->lists('COM_OrdenCompra_IdOrdenCompra');
		return $codOrdenes;
	}
	public static function InformacionProductosOrdenCompra($CodigoOrdenCompra){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('COM_DetalleOrdenCompra', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_DetalleOrdenCompra_idOrdenCompra')
			-> join('INV_Producto', 'COM_Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_ID as ID',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleOrdenCompra_Cantidad as Cantidad',
					  'COM_DetalleOrdenCompra_PrecioUnitario as Precio',
					  'COM_OrdenCompra_IdOrdenCompra as idOrden',
					  'COM_OrdenCompra_ISV as isv'
					  )
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> orderBy('COM_DetalleOrdenCompra_Cantidad', 'desc')
			-> get();
			
		return $Consulta;
	}

	public static function CambiaEstadoOrden($idOrden, $id){
             $or=  OrdenCompra::find($idOrden);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
			 $ide=2;
			 if($id=1){
				$ide=12;
			 }
			 if($id=0){
				$ide=10;
			 }
			 if($id=2){
				$ide=11;
			 }
             foreach($trans as $tran){
                  if($tran->COM_TransicionEstado_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
			$tran->COM_TransicionEstado_Activo=0;
                      	$tran->update();
                      	$ultimo=HistorialEstadoOrdenCompra::count();
                      	$historial=new HistorialEstadoOrdenCompra();
                      	$historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      	$historial->COM_TransicionEstado_Activo=1;
                      	$historial->COM_TransicionEstado_IdOrdenCompra=$idOrden;
                      	$historial->COM_Usuario_idUsuarioCreo=1;
                      	$historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      	$historial->COM_TransicionEstado_Observacion='Esta transicion fue Autorizada';
                      	$historial->COM_EstadoOrdenCompra_IdEstAnt=$tran->COM_EstadoOrdenCompra_IdEstAct;
                      	$historial->COM_EstadoOrdenCompra_IdEstAct=$ide;
                      	$historial->save();
                   } 
             }
        }

}