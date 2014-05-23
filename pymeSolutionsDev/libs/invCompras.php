<?php

	class invCompras {

		public static function ProductoReorden(){ //foreach
			return DB::table('INV_Producto')->where('INV_Producto_Cantidad', '<=', 50)->get();
		}

		public static function CualquierProducto(){ //invCompra::CualquierProducto[0]
			return Producto::all();
		}

		public static function ProveedorCompras($id){ // ->INV_Proveedor_Nombre
			return Proveedor::where('INV_Proveedor_ID', $id)->first();
		}

	}

?>