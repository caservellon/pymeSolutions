<?php

class BalanzaComprobacionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$Periodos = ClasificacionPeriodo::all()->lists('CON_ClasificacionPeriodo_Nombre','CON_ClasificacionPeriodo_ID');
		$Cuentas = DB::select(DB::raw('CALL CON_BalanzaComprobacion(1);'));
		return View::make('BalanzaComprobacion.index')
			->with('Cuentas',$Cuentas)
			->with('Periodos',$Periodos);
    }

    public function clasifPeriodos(){
    		
    		$Periodos = PeriodoContable::select(DB::raw('CON_PeriodoContable_ID,
    					 CONCAT(DATE_FORMAT(CON_PeriodoContable_FechaInicio,"%e %M %Y")," - ",DATE_FORMAT(CON_PeriodoContable_FechaFinal,"%e %M %Y")) as Rango'))
    										->where('CON_ClasificacionPeriodo_ID','=',Input::get('id'))
    										//->where('CON_PeriodoContable_FechaFinal','<=',date('Y-m-d H:m:s'))
    										//->orderBy('CON_PeriodoContable_ID','desc')
    										->get()
    										->lists('Rango','CON_PeriodoContable_ID');
    		return Form::select('PC',$Periodos,NULL,array('id'=>'PC'));	
    }

    public function table(){
    	$Cuentas = DB::select(DB::raw('CALL CON_BalanzaComprobacion(?)'),array(Input::get('id')));

    	if(sizeof($Cuentas)!=0)
    		return View::make('BalanzaComprobacion._table',compact('Cuentas'));
    	return "<p> No se encontro balanza </p>";
    }


}
