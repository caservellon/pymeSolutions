<?php

	class invContabilidad {

		public static function ProveedorInfo ($id){
			return Proveedor::where('INV_Proveedor_ID', $id)->first();
		}



		public static function Activar($id)
		{
			$motivo = MotivoMovimiento::find($id);
			if ($motivo) {
				$motivo->INV_MotivoMovimiento_Activo = 1;
				if($motivo->update())
					return 'Concepto Activado';
				else
					return 'Error Al Activar Concepto';
			}
			return 'Concepto No Encontrado';
		}

		public static function getFormaPago($id)
		{
			$forma = FormaPago::find($id);
			if ($forma) {
				$ret = array();
				$ret['Nombre'] = $forma->INV_FormaPago_Nombre;
				$ret['Dias'] = $forma->INV_FormaPago_DiasCredito;
				return $ret;
			}
			return 'Forma De Pago No Encontrado';
		}


		public static function getMotivos ()
		{
			return MotivoMovimiento::all();
		}

}
?>
