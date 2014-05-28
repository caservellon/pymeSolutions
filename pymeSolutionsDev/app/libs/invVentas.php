<?php

	class invVentas {

		public static function GetStockCount($Codigo){
			return Producto::where('INV_Producto_Codigo', $Codigo)->first()->INV_Producto_Cantidad;
		}

		public static function SearchProduct($Codigo){
			return Producto::where('INV_Producto_Codigo', $Codigo)->first();
		}

		public static function GetProductDetails($Codigo){

		}

		public static function Venta($Productos){
			$movimiento = array();
			$fecha = date('Y-m-d H:i:s');
			$user = 'Admin';

			//Se crea el movimiento que se genera con la venta
			//$movimiento['INV_Movimiento_IDOrdenCompra'] = null;
			$movimiento['INV_Movimiento_Observaciones'] = 'Venta de Producto(s)';
			$movimiento['INV_Movimiento_FechaCreacion'] = $fecha;
			$movimiento['INV_Movimiento_UsuarioCreacion'] = $user;
			$movimiento['INV_Movimiento_FechaModificacion'] = $fecha;
			$movimiento['INV_Movimiento_UsuarioModificacion'] = $user;
			$movimiento['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '1';
			MovimientoInventario::create($movimiento);

			//se busca el movimiento creado para realizar el detalle
			$temp = MovimientoInventario::where('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', '1')->orderBy('INV_Movimiento_ID', 'DESC')->get();
			$Movimiento = $temp[0];

			foreach ($Productos as $producto) {
				$detalle = array();
				$temp = Producto::where('INV_Producto_Codigo', $producto['VEN_DetalleDeVenta_Codigo'])->orderBy('INV_Producto_ID', 'DESC')->get();
				$prod = $temp[0];
				
				//se llenan los datos para almacenar el detalle
				$detalle['INV_DetalleMovimiento_IDProducto'] = $prod->INV_Producto_ID;
				$detalle['INV_DetalleMovimiento_CodigoProducto'] = $producto['VEN_DetalleDeVenta_Codigo'];
				$detalle['INV_DetalleMovimiento_NombreProducto'] = $prod->INV_Producto_Nombre;
				$detalle['INV_DetalleMovimiento_CantidadProducto'] = $producto['VEN_DetalleDeVenta_CantidadVendida'];
				$detalle['INV_DetalleMovimiento_PrecioCosto'] = $prod->INV_Producto_PrecioCosto;
				$detalle['INV_DetalleMovimiento_PrecioVenta'] = $producto['VEN_DetalleDeVenta_PrecioVenta'];
				$detalle['INV_DetalleMovimiento_FechaCreacion'] = $fecha;
				$detalle['INV_DetalleMovimiento_UsuarioCreacion'] = $user;
				$detalle['INV_DetalleMovimiento_FechaModificacion'] = $fecha;
				$detalle['INV_DetalleMovimiento_UsuarioModificacion'] = $user;
				$detalle['INV_Movimiento_ID'] = $Movimiento['INV_Movimiento_ID'];
				$detalle['INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '1';
				$detalle['INV_Producto_INV_Producto_ID'] = $prod->INV_Producto_ID;
				$detalle['INV_Producto_INV_Categoria_ID'] = $prod->INV_Categoria_ID;
				$detalle['INV_Producto_INV_Categoria_IDCategoriaPadre'] = $prod->INV_Categoria_IDCategoriaPadre;
				$detalle['INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID'] = $prod->INV_UnidadMedida_ID;
				DetalleMovimiento::create($detalle);

				//Actualizamos el Inventario
				$prod->INV_Producto_Cantidad = $prod->INV_Producto_Cantidad - $producto['VEN_DetalleDeVenta_CantidadVendida'];
				$prod->save();
			}
			return 'true';
		}

		public static function Devolucion($Productos){
			$movimiento = array();
			$fecha = date('Y-m-d H:i:s');
			$user = 'Admin';

			//Se crea el movimiento que se genera con la venta
			$movimiento['INV_Movimiento_Observaciones'] = 'Devolución Sobre Venta de Producto(s)';
			$movimiento['INV_Movimiento_FechaCreacion'] = $fecha;
			$movimiento['INV_Movimiento_UsuarioCreacion'] = $user;
			$movimiento['INV_Movimiento_FechaModificacion'] = $fecha;
			$movimiento['INV_Movimiento_UsuarioModificacion'] = $user;
			$movimiento['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '3';
			MovimientoInventario::create($movimiento);

			//se busca el movimiento creado para realizar el detalle
			$temp = MovimientoInventario::where('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', '3')->orderBy('INV_Movimiento_ID', 'DESC')->get();
			$Movimiento = $temp[0];
			
			foreach ($Productos as $producto) {
				$detalle = array();
				$temp = Producto::where('INV_Producto_Codigo', $producto['VEN_DetalleDeVenta_Codigo'])->orderBy('INV_Producto_ID', 'DESC')->get();
				$prod = $temp[0];

				//se llenan los datos para almacenar el detalle
				$detalle['INV_DetalleMovimiento_IDProducto'] = $prod['INV_Producto_ID'];
				$detalle['INV_DetalleMovimiento_CodigoProducto'] = $producto['VEN_DetalleDeVenta_Codigo'];
				$detalle['INV_DetalleMovimiento_NombreProducto'] = $prod['INV_Producto_Nombre'];
				$detalle['INV_DetalleMovimiento_CantidadProducto'] = $producto['VEN_DetalleDeVenta_CantidadVendida'];
				$detalle['INV_DetalleMovimiento_PrecioCosto'] = $prod['INV_Producto_PrecioCosto'];
				$detalle['INV_DetalleMovimiento_PrecioVenta'] = $producto['VEN_DetalleDeVenta_PrecioVenta'];
				$detalle['INV_DetalleMovimiento_FechaCreacion'] = $fecha;
				$detalle['INV_DetalleMovimiento_UsuarioCreacion'] = $user;
				$detalle['INV_DetalleMovimiento_FechaModificacion'] = $fecha;
				$detalle['INV_DetalleMovimiento_UsuarioModificacion'] = $user;
				$detalle['INV_Movimiento_ID'] = $Movimiento['INV_Movimiento_ID'];
				$detalle['INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '3';
				$detalle['INV_Producto_INV_Producto_ID'] = $prod['INV_Producto_ID'];
				$detalle['INV_Producto_INV_Categoria_ID'] = $prod['INV_Categoria_ID'];
				$detalle['INV_Producto_INV_Categoria_IDCategoriaPadre'] = $prod['INV_Categoria_IDCategoriaPadre'];
				$detalle['INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID'] = $prod['INV_UnidadMedida_ID'];
				DetalleMovimiento::create($detalle);

				//Actualizamos el Inventario
				$prod->INV_Producto_Cantidad = $prod->INV_Producto_Cantidad + $producto['VEN_DetalleDeVenta_CantidadVendida'];
				$prod->save();
			}
			return 'true';
		}
	}

?>