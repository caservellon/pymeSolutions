<?php

function cualquierProducto(){
	$query = DB::select('select INV_Producto_Codigo, INV_Producto_Nombre, INV_Producto_Descripcion, INV_Producto_Cantidad, INV_Producto_PuntoReorden,
		INV_Producto_PrecioVenta, INV_Producto_Activo, INV_Producto_PorcentajeDescuento, INV_Producto_ID FROM INV_Producto');
	$arreglo = $query;
	return $arreglo;
}

function proveedorCompras(id){
	$query = DB::select('select INV_Proveedor_Nombre, INV_Proveedor_Codigo, INV_Proveedor_Direccion, INV_Proveedor_Email, INV_Proveedor_ID');
	$arreglo = $query;
	return $arreglo;
}
