<?php

class LibroDiarioController extends BaseController {
	
	public function index()
	{
		if (Seguridad::VerLibroDiario()) {
				Cache::forget('date1');
				Cache::forget('date2');
				$LibroDiario = LibroDiario::paginate(3);
				$Asientos=$this->getAsientos($LibroDiario);
				$PeriodoContable = PeriodoContable::orderBy('CON_PeriodoContable_FechaInicio')->first();
				return View::make('LibroDiario.index')
					->with('PeriodoContable',$PeriodoContable)
					->with('LibroDiario',$Asientos)
					->with('Pages',$LibroDiario);
			
		}else{
			return Redirect::to('/403');
		}
	}

	public function search(){
		if (Seguridad::VerLibroDiario()) {
			if (Input::has('date1') && Input::has('date2')){
				$date1=Input::get('date1');
				$date2=Input::get('date2');
				Cache::forever('date1',$date1);
				Cache::forever('date2',$date2);
			}else{
				$date1=Cache::get('date1');
				$date2=Cache::get('date2');
			}
			$LibroDiario = LibroDiario::where('CON_LibroDiario_FechaCreacion','>=',$date1)
						->where('CON_LibroDiario_FechaCreacion','<=',$date2)
						->paginate(3);
			$Asientos=$this->getAsientos($LibroDiario);
			$PeriodoContable = PeriodoContable::orderBy('CON_PeriodoContable_FechaInicio')->first();

			return View::make('LibroDiario.index')
						->with('Fields',array($date1,$date2))
						->with('PeriodoContable',$PeriodoContable)
						->with('LibroDiario',$Asientos)
						->with('Pages',$LibroDiario);
		}else{
			return Redirect::to('/403');
		}

	}

	protected function getAsientos($LibroDiario){
		if (Seguridad::VerLibroDiario()) {
			$Asientos=array();
			foreach ($LibroDiario as $Asiento) {
			//	$Cuentas=CuentaMotivo::where('CON_MotivoTransaccion_ID','=',$Asiento->CON_MotivoTransaccion_ID)->get();
				
				$CuentaMotivo= CuentaMotivo::where('CON_MotivoTransaccion_ID','=',$Asiento->CON_MotivoTransaccion_ID)->get();

				if ($CuentaMotivo[0]->CON_CuentaMotivo_DebeHaber!=1
					XOR $Asiento->CON_LibroDiario_AsientoReversion==1
					){

				   $Debe= CatalogoContable::find($CuentaMotivo[0]->CON_CatalogoContable_ID);
				   $Haber = CatalogoContable::find($CuentaMotivo[1]->CON_CatalogoContable_ID);
				}
				else{
					$Haber = CatalogoContable::find($CuentaMotivo[0]->CON_CatalogoContable_ID);
					$Debe = CatalogoContable::find($CuentaMotivo[1]->CON_CatalogoContable_ID);
				}

				$Debe=$Debe->CON_CatalogoContable_Nombre;
				$Haber=$Haber->CON_CatalogoContable_Nombre; 

				$Asientos[$Asiento->CON_LibroDiario_ID][0]=array(
					'no'=> $Asiento->CON_LibroDiario_ID,
					'fecha'=> $Asiento->CON_LibroDiario_FechaCreacion,
					'cuenta'=>$Debe,
					'observacion'=>$Asiento->CON_LibroDiario_Observacion,
					'monto'=>$Asiento->CON_LibroDiario_Monto,
					'reversion'=>$Asiento->CON_LibroDiario_AsientoReversion,
					'revertido'=>$Asiento->CON_LibroDiario_Revertido);
				$Asientos[$Asiento->CON_LibroDiario_ID][1]=array(
					'cuenta'=>"\t".$Haber,
					'monto'=> $Asiento->CON_LibroDiario_Monto);
			}
			return $Asientos;
		}else{
			return Redirect::to('/403');
		}
	}

	Public function reversion(){
	 	$id = Input::get('id');
	 	$diario = LibroDiario::find($id);
	 	if(Seguridad::RevertirAsientosContables() &&(!is_null($diario) && $diario->CON_LibroDiario_AsientoReversion == 0) && ($diario->CON_LibroDiario_Revertido == 0)){
			$libro = new LibroDiario;
			$libro->CON_LibroDiario_Monto = $diario->CON_LibroDiario_Monto;
			$libro->CON_MotivoTransaccion_ID = $diario->CON_MotivoTransaccion_ID;
			$libro->CON_LibroDiario_Observacion = "Es una reversion del Asiento No." . $id;
			$libro->CON_LibroDiario_FechaCreacion = date('Y-m-d');
			$libro->CON_LibroDiario_FechaModificacion = date('Y-m-d');
			$libro->CON_LibroDiario_AsientoReversion = 1;
			$libro->save();
			$diario->CON_LibroDiario_Revertido=1;
			$diario->save();
			return Response::json(array('success'=>true));
			//return Redirect::to('contabilidad/librodiario');
		}else{
			//return Redirect::action('LibroDiarioController@index');
			return Response::json(array('success'=>false));
		
		}
	}

}
