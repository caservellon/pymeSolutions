<?php
class Helpers {
	public static function(){
		$idOrdenes = HistorialEstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstAct','=','9')->lists('COM_TransicionEstado_IdOrdenCompra');
		 $codOrdenes=OrdenCompra::wherein('COM_OrdenCompra_IdOrdenCompra',$idOrdenes)->lists('COM_OrdenCompra_Codigo');
		return $codOrdenes;
	}
	public static function InformacionProductosOrdenCompra($CodigoOrdenCompra){
		$Consulta = DB::table('COM_OrdenCompra')
			-> join('COM_DetalleOrdenCompra', 'COM_OrdenCompra_IdOrdenCompra', '=', 'COM_DetalleOrdenCompra_idOrdenCompra')
			-> join('INV_Producto', 'COM_Producto_idProducto', '=', 'INV_Producto_ID')
			-> select('INV_Producto_Codigo as Codigo',
					  'INV_Producto_Nombre as Nombre',
					  'INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleOrdenCompra_Cantidad as Cantidad',
					  'COM_DetalleOrdenCompra_PrecioUnitario as Precio'
					  )
			-> where('COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> orderBy('COM_DetalleOrdenCompra_Cantidad', 'desc')
			-> get();
			
		return $Consulta;
	}


}