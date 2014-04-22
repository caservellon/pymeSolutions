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

		public static function TouchSale($Codigo, $Cantidad){

		}

		public static function TouchReturn($Codigo, $Cantidad){

		}
	}

?>