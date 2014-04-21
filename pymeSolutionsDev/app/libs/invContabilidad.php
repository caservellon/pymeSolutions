<?php

	class invContabilidad {

		public static function ProveedorInfo ($id){
			return Proveedor::where('INV_Proveedor_ID', $id)->first();	 
		}
		
	}

?>