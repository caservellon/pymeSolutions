<?php


	class EstadosFinancierosController extends BaseController {



		public function index(){

			$CPeriodos = ClasificacionPeriodo::all();
			$ID_Periodo = $CPeriodos[0]->CON_ClasificacionPeriodo_ID;
			$CPeriodos=$CPeriodos->lists('CON_ClasificacionPeriodo_Nombre','CON_ClasificacionPeriodo_ID');
			
			return View::make('EstadosFinancieros.index')
				->with(array('CPeriodos'=>$CPeriodos,'Periodos'=>$this->getPeriodosLists($ID_Periodo)));
		}

		private function getPeriodosLists($id){
			$Periodos = PeriodoContable::select(DB::raw('CON_PeriodoContable_ID,
    					 CONCAT(DATE_FORMAT(CON_PeriodoContable_FechaInicio,"%e %M %Y")," - ",DATE_FORMAT(CON_PeriodoContable_FechaFinal,"%e %M %Y")) as Rango'))
    										->where('CON_ClasificacionPeriodo_ID','=',$id)
    										//->where('CON_PeriodoContable_FechaFinal','<=',date('Y-m-d H:m:s'))
    										//->orderBy('CON_PeriodoContable_ID','desc')
    										->get()
    										->lists('Rango','CON_PeriodoContable_ID');
    		return $Periodos;
		}

		public function getPeriodos(){
			return Form::select('PC',$this->getPeriodosLists(Input::get('id')),NULL,array('class'=>'form-control','id'=>'PC'));
		}

		public function balanza(){
	    	$Cuentas = DB::select(DB::raw('CALL CON_BalanzaComprobacion(?)'),array(Input::get('id')));

	    	if(sizeof($Cuentas)!=0)
	    		return View::make('EstadosFinancieros._balanza',compact('Cuentas'));
	    	return "<p> No se encontro balanza </p>";
	    }

	    public function estado(){
	    	$EstadoResultado = EstadoResultado::findOrFail(Input::get('id'));

			return View::make('EstadosFinancieros._estado', compact('EstadoResultado'));
	    }

	    public function balance(){
	    	$BalanceGeneral = BalanceGeneral::findOrFail(Input::get('id'));
			$CuentasT = DB::table('CON_CatalogoContable')
	            ->join('CON_CuentaT', 'CON_CatalogoContable.CON_CatalogoContable_ID', '=', 'CON_CuentaT.CON_CatalogoContable_ID')
	            ->join('CON_LibroMayor', 'CON_LibroMayor.CON_LibroMayor_ID', '=', 'CON_CuentaT.CON_LibroMayor_ID')
	            ->select('CON_CatalogoContable.CON_CatalogoContable_Nombre', 'CON_CuentaT.CON_CuentaT_SaldoFinal', 'CON_CatalogoContable.CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID')
	            ->get();					

			return View::make('EstadosFinancieros._balance', compact('BalanceGeneral',"CuentasT"));
	    }

	    public function libromayor(){
	    	$LibroMayor = DB::select(DB::raw('CALL CON_BalanzaComprobacion(?)'),array(Input::get('id')));
        			return View::make('EstadosFinancieros._libromayor')
        			->with('Libro',$LibroMayor);
	    }
	}