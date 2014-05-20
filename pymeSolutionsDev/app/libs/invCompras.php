<?php

	class invCompras {

		public static function ProductoReorden(){ //foreach
			return DB::table('INV_Producto')->where('INV_Producto_Cantidad', '<=', 'INV_Producto_PuntoReorden')->get();
		}

		public static function CualquierProducto(){ //invCompra::CualquierProducto[0]
			return Producto::where('INV_Producto_Activo', '=', 1)->get();
		}

		public static function ProveedorCompras($id){ // ->INV_Proveedor_Nombre
			return Proveedor::where('INV_Proveedor_ID', $id)->first();
		}
                
                public static function ProductoCompras($id){ // ->INV_Proveedor_Nombre
			return Producto::where('INV_Producto_ID', $id)->first();
		}

	}

?>