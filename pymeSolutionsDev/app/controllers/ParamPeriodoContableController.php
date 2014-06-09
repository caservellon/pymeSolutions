<?php

class ParamPeriodoContableController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $ClasificacionPeriodo, $PeriodoContable;
	protected $CantidadDias=array("15","30","60","90","120","180","360","365","366");
	public function __construct(ClasificacionPeriodo $ClasificacionPeriodo, PeriodoContable $PeriodoContable){
		$this->ClasificacionPeriodo = $ClasificacionPeriodo;
		$this->PeriodoContable = $PeriodoContable;
	}

	public function index()
	{
		if (Seguridad::ListarPeriodosContables()) {
			$CP = $this->ClasificacionPeriodo->withTrashed()->get();
			//$PC = $this->PeriodoContable->all();
	        return View::make('paramPeriodoContable.index')
	        	->with('ClasificacionPeriodo',$CP);
        }else{
				return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Seguridad::AgregarPeriodoContable()) {
        	return View::make('paramPeriodoContable.create')
        			->with('CantidadDias',$this->CantidadDias);
        }else{
			return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Seguridad::AgregarPeriodoContable()) {
			$input = Input::all();
			$rules=str_replace('?', date('Y-m-d',strtotime("-1 days")), ClasificacionPeriodo::$rules); 

			$validation = Validator::make($input, $rules,ClasificacionPeriodo::$messages,ClasificacionPeriodo::$atributos);
			if ($validation->fails())
			{
				return Redirect::action('ParamPeriodoContableController@create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
			}else{
				$ClasificacionPeriodo = new ClasificacionPeriodo;
				$ClasificacionPeriodo->CON_ClasificacionPeriodo_Nombre = Input::get('CON_ClasificacionPeriodo_Nombre');
				$ClasificacionPeriodo->CON_ClasificacionPeriodo_CatidadDias= $this->CantidadDias[Input::get('CON_ClasificacionPeriodo_CatidadDias')];
				$ClasificacionPeriodo->CON_ClasificacionPeriodo_FechaCreacion=  date('Y-m-d');
				$ClasificacionPeriodo->CON_ClasificacionPeriodo_FechaModificacion= date('Y-m-d');
				if($ClasificacionPeriodo->save()){
				
				$PeriodoContable = new PeriodoContable;
				$PeriodoContable->CON_PeriodoContable_FechaInicio = Input::get('CON_PeriodoContable_FechaInicio');
				$PeriodoContable->CON_PeriodoContable_FechaFinal = $this->getFinalDate($PeriodoContable->CON_PeriodoContable_FechaInicio,$ClasificacionPeriodo->CON_ClasificacionPeriodo_CatidadDias);
				$PeriodoContable->CON_ClasificacionPeriodo_ID = $ClasificacionPeriodo->CON_ClasificacionPeriodo_ID;
				$PeriodoContable->CON_PeriodoContable_FechaCreacion= date('Y-m-d');
				$PeriodoContable->CON_PeriodoContable_FechaModificacion= date('Y-m-d');
				$PeriodoContable->save();
				}
				return Redirect::action('ParamPeriodoContableController@index');
			}
		}else{
			return Redirect::to('/403');
		}
		
	}
	private function getFinalDate($fechaInicio,$dias){
		if (Seguridad::AgregarPeriodoContable()) {
			return date("Y-m-d", strtotime($fechaInicio." +".$dias." day"));
		}else{
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Seguridad::EditarPeriodoContable()) {
			$CP = ClasificacionPeriodo::find($id);
			if (is_null($CP))
			{
				return Redirect::action('ParamPeriodoContableController@index');

			}
			$CP->CON_PeriodoContable_FechaInicio=PeriodoContable::where('CON_ClasificacionPeriodo_ID','=',$id)->get();
			$CP->CON_PeriodoContable_FechaInicio=strstr($CP->CON_PeriodoContable_FechaInicio[0]['CON_PeriodoContable_FechaInicio'],' ',true);
	        return View::make('paramPeriodoContable.edit')
	        	->with('ClasificacionPeriodo',$CP)
	        	->with('CantidadDias',$this->CantidadDias);
        }else{
				return Redirect::to('/403');
		}
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Seguridad::EditarPeriodoContable()) {
			$input = array_except(Input::all(), '_method');
			$rules = array(
				//'CON_ClasificacionPeriodo_ID' => 'required|integer',

				'CON_ClasificacionPeriodo_Nombre' => 'required|max:45|alpha_spaces',


			);
			$validation = Validator::make($input, $rules);

			if ($validation->passes())
			{
				$ClasificacionPeriodo = $this->ClasificacionPeriodo->find($id);
				//$input['CON_ClasificacionPeriodo_CatidadDias'] = $this->CantidadDias[Input::get('CON_ClasificacionPeriodo_CatidadDias')];
				if($ClasificacionPeriodo->update($input))
				{
					//$PeriodoContable = PeriodoContable::where('CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID','=',$id)->get();
					//$PeriodoContable =$PeriodoContable[0];
					//$PeriodoContable->update($input);
					return Redirect::action('ParamPeriodoContableController@index');
				}
			}

			return Redirect::action('ParamPeriodoContableController@edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		}else{
				return Redirect::to('/403');
		}
	}

	public function enable($id){
		if (Seguridad::HabilitarDeshabilitarPeriodosContables()) {
			$clasificacion=ClasificacionPeriodo::withTrashed()->where('CON_ClasificacionPeriodo_ID', $id)->restore();
			return Redirect::action('ParamPeriodoContableController@index');	
		}else{
				return Redirect::to('/403');
		}
	}

}
