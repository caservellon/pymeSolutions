<?php

class Contabilidad {


	public static function GetMotivo($Concepto){
			return DB::table('CON_ConceptoMotivo')->where('CON_ConceptoMotivo_ID',$Concepto)->pluck('CON_MotivoTransaccion_ID');
	}	


	public static function GenerarTransaccion($Concepto,$Monto){
		$IDMotivo= Contabilidad::GetMotivo($Concepto);
		DB::table('CON_TransaccionContabilidad')->insertGetId(
			array('CON_TransaccionContabilidad_Importe' => $Monto,
				  'CON_TransaccionContabilidad_UsuarioCreacion' => 'Admin',
				  'CON_TransaccionContabilidad_FechaCreacion' => date('Y-m-d H:i:s'),
				  'CON_TransaccionContabilidad_FechaModificacion' => date('Y-m-d H:i:s'),
				  'CON_UnidadMonetaria_ID' => 1,
				  'CON_MotivoTransaccion_ID' => $IDMotivo)
			);
		return 'ok';
	}


}
?>