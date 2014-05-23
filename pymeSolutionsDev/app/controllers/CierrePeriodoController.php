<?php

class CierrePeriodoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		if(Request::isMethod('post')){
			if (Cache::has('PeriodosContables')){
				$periodos=Cache::get('PeriodosContables');
				$periodo=$periodos[Input::get('periodo')][1];
				Cache::put('PeriodoContable',$periodo,30); 
				Cache::forget('PeriodosContables');	
				return View::Make('CierrePeriodo.index');
			}
			return Redirect::route('con.cierreperiodo');
			
		}else{
			$array=array();
			$CP=ClasificacionPeriodo::orderBy('CON_ClasificacionPeriodo_CatidadDias','Desc')->get();
			$counter=0;
			$actual_date=date('Y-m-d H:m:s');
			for ($i=0; $i < sizeof($CP); $i++) { 
				$periodo=$CP[$i]->PeriodosContables()
                    ->orderBy('CON_PeriodoContable_FechaFinal','Desc')
                    ->take(1)->get();
                $periodo=$periodo[0];
				$final_date=$periodo->CON_PeriodoContable_FechaFinal;
				if ($final_date>$actual_date){
					//continue;
				}
				$array[$counter][0]=$CP[$i];
				$array[$counter][1]=$periodo;
				$counter++;
			}
			Cache::put('PeriodosContables', $array, 10);
			return View::Make('CierrePeriodo.form',compact('array'));
		}
        
    }

    public function run(){
        $array=array();
        $current=0;
        try {

            $periodo=Cache::get('PeriodoContable');
            $periodoId=$periodo->CON_PeriodoContable_ID;
            
            DB::beginTransaction();

            $result=DB::statement(DB::raw('CALL CON_Mayorizacion(?,?);'),
                array($periodoId,$periodo->CON_PeriodoContable_FechaFinal));
            
            $array[0]=array(0,'30%');

            //Simula Creacion de Balanza
            $array[1]=array(1,'40%');
            Cache::forever('EstadoCierre',$array);
            $current+=2;
            //sleep(2);
            //Estado
            $result=DB::statement(DB::raw('CALL CON_EstadoResultados(?)'),
                array($periodoId));
            $array=array_merge(Cache::get('EstadoCierre'),array(array(2,'65%')));
            Cache::forever('EstadoCierre',$array);
            $current++;
            //sleep(2);
            //Balance
            $result=DB::statement(DB::raw('CALL CON_BalanceGeneral(?)'),
                array($periodoId));
            $array=array_merge(Cache::get('EstadoCierre'),array(array(3,'85%')));
            Cache::forever('EstadoCierre',$array);
            $current++;
            //sleep(2);
            //Nuevo Periodo
            $result=DB::statement(DB::raw('CALL CON_NuevoPeriodo(?)'),
                array($periodoId));
            $array=array_merge(Cache::get('EstadoCierre'),array(array(4,'100%')));

            DB::commit();
            Cache::forget('PeriodoContable');
            Cache::forever('EstadoCierre',$array);
            
        } catch (Exception $e) {
           // Cache::forever('EstadoCierre',array('Error'=>));
            DB::rollBack();
            return Response::json(
                array('success'=>false,
                      'error'=>json_encode($e->getMessage()),
                      'current'=> $current
                ));
        }
        return Response::json(
            array('success'=>true,
                    'msg'=>View::make('CierrePeriodo._success')->render() ));
    }

    public function retrieve(){
        $array=Cache::get('EstadoCierre');
        Cache::forever('EstadoCierre',array());
        return Response::json($array);
    }

    public function mayorizar(){
    	if (Request::ajax()){
              $periodo=Cache::get('PeriodoContable');
    		  $result=DB::select('CALL CON_Mayorizacion(?,?);',
    			 array($periodo->CON_PeriodoContable_ID,$periodo->CON_PeriodoContable_FechaFinal));
           
    		return json_encode($result);
    	}
    	return "error";
    }

    public function balanza(){

    	if(Request::ajax()){
    		return ':D';
    	}
    	return 'error';
    }

    public function estado(){
    	if(Request::ajax()){
    		$result=DB::statement(DB::raw('CALL CON_EstadoResultados(?)'),
    			array(Cache::get('PeriodoContable')->CON_PeriodoContable_ID));
    		return json_encode($result);
    	}
    	return 'error';

    }

    public function balance(){
    	if(Request::ajax()){
    		$result=DB::statement(DB::raw('CALL CON_BalanceGeneral(?)'),
    			array(Cache::get('PeriodoContable')->CON_PeriodoContable_ID));
    		return json_encode($result);
    	}
    	return 'error';
    }

    public function nuevoPeriodo(){
    	if(Request::ajax()){
    		$periodo=Cache::get('PeriodoContable');
    		$result=DB::statement(DB::raw('CALL CON_NuevoPeriodo(?)'),
    			array($periodo->CON_PeriodoContable_ID));
    		return json_encode($result);
    	}
    }
	

}
