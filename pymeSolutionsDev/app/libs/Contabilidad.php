<?php

class Contabilidad {


	public static function GetMotivo($Concepto){
			return DB::table('CON_ConceptoMotivo')->where('CON_ConceptoMotivo_ID',$Concepto)->pluck('CON_MotivoTransaccion_ID');
	}	


	public static function GenerarTransaccion($Concepto,$Monto){
		if ($Monto!=0){
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
				  'CON_LibroDiario_Revertido'=> 1)
			);
		return 'ok';
		}
		return 'not ok';

	}


public static function invGetMotivo($Concepto){
			return DB::table('CON_MotivoInventario')->where('CON_MotivoInventario_ID',$Concepto)->pluck('CON_MotivoTransaccion_ID');
	}	

	public static function invGenerarTransaccion($Concepto,$Monto){
		if ($Monto!=0){
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
					  'CON_LibroDiario_Revertido'=> 1)
				);
			return 'ok';
		}
			return 'not ok';
	}



public static function isValid(){

	$clasificacion=ClasificacionPeriodo::all();

	if ($clasificacion->count()){
		return true;
	}
	return false;
}


public static function GenerarTransaccionCmp($Concepto,$Monto,$IdProv){
		if ($Monto!=0){
			$IDMotivo= Contabilidad::GetMotivo($Concepto);
			DB::table('CON_LibroDiario')->insertGetId(
				array('CON_LibroDiario_Observacion' =>'Asiento Automatico: Proveedor '.invContabilidad::ProveedorInfo($IdProv)->INV_Proveedor_Nombre,
					  'CON_LibroDiario_FechaCreacion'=> date('Y-m-d H:i:s'),
					  'CON_LibroDiario_FechaModificacion'=>date('Y-m-d H:i:s'),
					  'CON_LibroDiario_Monto'=>$Monto,
					  'CON_MotivoTransaccion_ID'=>$IDMotivo,
					  'CON_LibroDiario_Revertido'=> 1)
				);
			return 'ok';
		}
		return 'not ok';

}

public static function GenerarTransaccionCmpSM($Concepto,$Monto,$IdProv){
		if ($Monto!=0){
			$IDMotivo= Contabilidad::GetMotivo($Concepto);
			DB::table('CON_LibroDiario')->insertGetId(
				array('CON_LibroDiario_Observacion' =>'Asiento Semi-Automatico: Proveedor '.invContabilidad::ProveedorInfo($IdProv)->INV_Proveedor_Nombre,
					  'CON_LibroDiario_FechaCreacion'=> date('Y-m-d H:i:s'),
					  'CON_LibroDiario_FechaModificacion'=>date('Y-m-d H:i:s'),
					  'CON_LibroDiario_Monto'=>$Monto,
					  'CON_MotivoTransaccion_ID'=>$IDMotivo,
					  'CON_LibroDiario_Revertido'=> 1)
				);
			return 'ok';
		}
		return 'not ok';

}

} ?>