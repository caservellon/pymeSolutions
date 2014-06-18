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

public static function motivoProveedor($IdProv){
	$Prov=CONProveedor::find($IdProv);

	if ($Prov){
		return $Prov->CON_MotivoTransaccion_ID;
	}else{
		$ProvName=invContabilidad::ProveedorInfo($IdProv)->INV_Proveedor_Nombre;
		$Date=date('Y-m-d H:i:s');

		$Cuenta=CatalogoContable::find(75);

		//DB::beginTransaction();
		
		$input=array(
			'CON_CatalogoContable_ID'=>75,
			'CON_Subcuenta_Nombre'=>$Cuenta->CON_CatalogoContable_Nombre.' '.$ProvName,
			'CON_Subcuenta_FechaCreacion'=>$Date,
			'CON_Subcuenta_FechaModificacion'=>$Date
			);
		$SubCuenta=Subcuentum::create($input);

		
		$Motivo=new MotivoTransaccion;
		$idMotivo=DB::table('CON_MotivoTransaccion')->insertGetId(array(
			'CON_MotivoTransaccion_Codigo'=>'P'.$IdProv,
			'CON_MotivoTransaccion_Descripcion'=>'Compra a Proveedor '.$ProvName,
			'CON_MotivoTransaccion_FechaCreacion'=>$Date,
			'CON_MotivoTransaccion_FechaModificacion'=>$Date
			));
		//DB::commit();
		$Cuenta1=CatalogoContable::where('CON_CatalogoContable_Nombre','=','Inventario en Transito')->first();
		$input=array('CON_CuentaMotivo_DebeHaber' => 0,
				'CON_MotivoTransaccion_ID'=>$idMotivo,
				'CON_CatalogoContable_ID'=>$Cuenta1->CON_CatalogoContable_ID,
				'CON_CuentaMotivo_FechaCreacion'=>$Date,
				'CON_CuentaMotivo_FechaModificacion'=>$Date );
		//$CuentaMotivo1=new CuentaMotivo;
		$CuentaMotivo1=CuentaMotivo::create($input);


		$Cuenta2=CatalogoContable::where('CON_CatalogoContable_Nombre','=',$SubCuenta->CON_Subcuenta_Nombre)->first();
		$input=array('CON_CuentaMotivo_DebeHaber' => 1 ,
				'CON_MotivoTransaccion_ID'=>$idMotivo,
				'CON_CatalogoContable_ID'=>$Cuenta2->CON_CatalogoContable_ID,
				'CON_CuentaMotivo_FechaCreacion'=>$Date,
				'CON_CuentaMotivo_FechaModificacion'=>$Date );
		//$CuentaMotivo2=new CuentaMotivo;
		$CuentaMotivo2=CuentaMotivo::create($input);

		$input=array(
			'INV_Proveedores_ID'=>$IdProv,
			'CON_MotivoTransaccion_ID'=>$idMotivo
			);
		$Prov=CONProveedor::create($input);
		return $idMotivo;
	}
	return null;
}

} ?>