<?php


	class EstadosFinancierosController extends BaseController {



		public function index(){
			if (Seguridad::VerEstadosFinancieros()) {
				$CPeriodos = ClasificacionPeriodo::all();
				$ID_Periodo = $CPeriodos[0]->CON_ClasificacionPeriodo_ID;
				$CPeriodos=$CPeriodos->lists('CON_ClasificacionPeriodo_Nombre','CON_ClasificacionPeriodo_ID');
				
				return View::make('EstadosFinancieros.index')
					->with(array('CPeriodos'=>$CPeriodos,'Periodos'=>$this->getPeriodosLists($ID_Periodo)));
			}else{
				return Redirect::to('/403');
			}
		}

		private function getPeriodosLists($id){
			if (Seguridad::VerEstadosFinancieros()) {
				$Periodos = PeriodoContable::select(DB::raw('CON_PeriodoContable_ID,
	    					 CONCAT(DATE_FORMAT(CON_PeriodoContable_FechaInicio,"%e %M %Y")," - ",DATE_FORMAT(CON_PeriodoContable_FechaFinal,"%e %M %Y")) as Rango'))
	    										->where('CON_ClasificacionPeriodo_ID','=',$id)
	    										//->where('CON_PeriodoContable_FechaFinal','<=',date('Y-m-d H:m:s'))
	    										//->orderBy('CON_PeriodoContable_ID','desc')
	    										->get()
	    										->lists('Rango','CON_PeriodoContable_ID');
	    		return $Periodos;
	    	}else{
				return Redirect::to('/403');
			}	
		}

		public function getPeriodos(){
			if (Seguridad::VerEstadosFinancieros()) {
				return Form::select('PC',$this->getPeriodosLists(Input::get('id')),NULL,array('class'=>'form-control','id'=>'PC'));
			}else{
				return Redirect::to('/403');
			}
		}

		public function balanza(){
			if (Seguridad::VerEstadosFinancieros()) {
		    	$Cuentas = DB::select(DB::raw('CALL CON_BalanzaComprobacion(?)'),array(Input::get('id')));
		    	$config = Configuracion::find(1);

		    	if(sizeof($Cuentas)!=0)
		    		return View::make('EstadosFinancieros._balanza',compact('Cuentas','config'));
		    	return "<p> No se encontro balanza </p>";
		    }else{
				return Redirect::to('/403');
			}
	    }

	    public function estado(){
	    	if (Seguridad::VerEstadosFinancieros()) {
		    	$EstadoResultado = EstadoResultado::find(Input::get('id'));
		    	$config = Configuracion::find(1);
		    	if ($EstadoResultado)
					return View::make('EstadosFinancieros._estado', compact('EstadoResultado','config'));
				return "No se encontro estado de resultados";
			}else{
				return Redirect::to('/403');
			}
	    }

	    public function balance(){
	    	if (Seguridad::VerEstadosFinancieros()) {
		    	$BalanceGeneral = BalanceGeneral::find(Input::get('id'));
		    	$config = Configuracion::find(1);

		    	if ($BalanceGeneral){
				$CuentasT = DB::table('CON_CatalogoContable')
		            ->join('CON_CuentaT', 'CON_CatalogoContable.CON_CatalogoContable_ID', '=', 'CON_CuentaT.CON_CatalogoContable_ID')
		            ->join('CON_LibroMayor', 'CON_LibroMayor.CON_LibroMayor_ID', '=', 'CON_CuentaT.CON_LibroMayor_ID')
		            ->select('CON_CatalogoContable.CON_CatalogoContable_Nombre', 'CON_CuentaT.CON_CuentaT_SaldoFinal', 'CON_CatalogoContable.CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID')
		            ->get();					

				return View::make('EstadosFinancieros._balance', compact('BalanceGeneral',"CuentasT",'config'));
				}
				return "No se encontro balance general";
			}else{
				return Redirect::to('/403');
			}	
	    }

	    public function libromayor(){
	    	if (Seguridad::VerEstadosFinancieros()) {
		    	$LibroMayor = DB::select(DB::raw('CALL CON_BalanzaComprobacion(?)'),array(Input::get('id')));
		    	$config = Configuracion::find(1);
	        		if($LibroMayor)
	        			return View::make('EstadosFinancieros._libromayor')->with('Libro',$LibroMayor)->with('config',$config);
	        		return "No se encontro libro mayor";
	        }else{
				return Redirect::to('/403');
			}
	    }
	}