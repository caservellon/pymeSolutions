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
		DB::table('CON_LibroDiario')->insertGetId(
			array('CON_LibroDiario_Observacion' =>'Asiento Automatico',
				  'CON_LibroDiario_FechaCreacion'=> date('Y-m-d H:i:s'),
				  'CON_LibroDiario_FechaModificacion'=>date('Y-m-d H:i:s'),
				  'CON_LibroDiario_Monto'=>$Monto,
				  'CON_MotivoTransaccion_ID'=>$IDMotivo,
				  'CON_LibroDiario_AsientoReversion'=> 1)
			);
		return 'ok';
	}


public static function invGetMotivo($Concepto){
			return DB::table('CON_MotivoInventario')->where('CON_MotivoInventario_ID',$Concepto)->pluck('CON_MotivoTransaccion_ID');
	}	

	public static function invGenerarTransaccion($Concepto,$Monto){
		$IDMotivo= Contabilidad::invGetMotivo($Concepto);
		DB::table('CON_TransaccionContabilidad')->insertGetId(
			array('CON_TransaccionContabilidad_Importe' => $Monto,
				  'CON_TransaccionContabilidad_UsuarioCreacion' => 'Admin',
				  'CON_TransaccionContabilidad_FechaCreacion' => date('Y-m-d H:i:s'),
				  'CON_TransaccionContabilidad_FechaModificacion' => date('Y-m-d H:i:s'),
				  'CON_UnidadMonetaria_ID' => 1,
				  'CON_MotivoTransaccion_ID' => $IDMotivo)

			);
		DB::table('CON_LibroDiario')->insertGetId(
			array('CON_LibroDiario_Observacion' =>'Asiento Automatico',
				  'CON_LibroDiario_FechaCreacion'=> date('Y-m-d H:i:s'),
				  'CON_LibroDiario_FechaModificacion'=>date('Y-m-d H:i:s'),
				  'CON_LibroDiario_Monto'=>$Monto,
				  'CON_MotivoTransaccion_ID'=>$IDMotivo,
				  'CON_LibroDiario_AsientoReversion'=> 1)
			);
		return 'ok';
	}



public static function isValid(){

	$clasificacion=ClasificacionPeriodo::all();

	if ($clasificacion->count()){
		return true;
	}
	return false;
}	

} ?>