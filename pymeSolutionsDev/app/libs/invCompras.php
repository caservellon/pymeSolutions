<?php

	class invCompras {

		public static function ProductoReorden(){ //foreach
			#return Producto::where('INV_Producto_Cantidad', '=', 'INV_Producto_PuntoReorden')->get();
			return Producto::whereRaw('INV_Producto_Cantidad <= INV_Producto_PuntoReorden')->get();
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
                //buscar uno en especifico
        public static function FormaPagoCompras($id){ // ->INV_Proveedor_Nombre
			return FormaPago::where('INV_FormaPago_ID', $id)->first();
		}
                //select para ver los que pertenecen al proveedor
        public static function FormaPagolista($id){ 
			return FormaPago::find($id)->lists('INV_FormaPago_Nombre','INV_FormaPago_ID');
		}
                
        public static function UnidadCompras($id){ 
			return UnidadMedida::where('INV_UnidadMedida_ID', $id)->first();
		}
		
		public static function ProductoProveedor($idProducto){ //foreach 
			$ProductoProveedor = DB::table('INV_Producto_Proveedor')->whereRaw('INV_Producto_ID =' .$idProducto)->get();
			$temp = array();
                        
			foreach($ProductoProveedor as $PP){
				array_push($temp, $PP->INV_Proveedor_ID);
			}
                        
			return Proveedor::whereIn('INV_Proveedor_ID', $temp)->get();
                        
                            
		}

		public static function ProveedorProducto($idProveedor){ //foreach 
			$ProveedorProducto = DB::table('INV_Producto_Proveedor')->whereRaw('INV_Proveedor_ID ='.$idProveedor)->get();
			$temp = array();
			foreach($ProveedorProducto as $PP){
				array_push($temp, $PP->INV_Producto_ID);
			}
                        
                            return Producto::whereIn('INV_Producto_ID', $temp)->get();
		}

		public static function ProveedorFormaPago($idProveedor){ // ->INV_FormaPago_DiasCredito() | ->INV_FormaPago_Nombre()
			$PFP = DB::table('INV_Proveedor_FormaPago')->whereRaw('INV_Proveedor_ID ='.$idProveedor)->get();
			$temp = array();
			foreach($PFP as $FP){
				array_push($temp, $FP->INV_FormaPago_ID);
			}
                        
                            return FormaPago::whereIn('INV_FormaPago_ID', $temp)->get();
		}


		public static function getProductosRechazados()
		{
			return ProductoRechazado::where('INV_ProductoRechazado_Activo', '1')->get();
		}


		public static function getOrdenRechazada($id)
		{
			return ProductoRechazado::where('INV_ProductoRechazado_Activo', '1')->where('INV_ProductoRechazado_IDOrdenCompra', $id)->get();
		}


		public static function setOrdenRechazada($id)
		{
			$detalle = ProductoRechazado::where('INV_ProductoRechazado_IDOrdenCompra', $id)->get();
			foreach ($detalle as $det) {
				$prod = ProductoRechazado::find($det->INV_ProductoRechazado_ID);
				$prod->INV_ProductoRechazado_Activo = 0;
				$prod->INV_ProductoRechazado_FechaModificacion = date('Y-m-d H:i:s');
				//$prod->INV_ProductoRechazado_UsuarioModificacion = Auth::user()->id;
				$prod->save();
			}
			return '1';
		}

	}

?>