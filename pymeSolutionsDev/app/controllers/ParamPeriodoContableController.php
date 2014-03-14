<?php

class ParamPeriodoContableController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $ClasificacionPeriodo, $PeriodoContable;
	protected $CantidadDias=array("15","30","60","90","120","180","365","366");
	public function __construct(ClasificacionPeriodo $ClasificacionPeriodo, PeriodoContable $PeriodoContable){
		$this->ClasificacionPeriodo = $ClasificacionPeriodo;
		$this->PeriodoContable = $PeriodoContable;
	}

	public function index()
	{
		$CP = $this->ClasificacionPeriodo->all();
		$PC = $this->PeriodoContable->all();
        return View::make('paramPeriodoContable.index')
        	->with('ClasificacionPeriodo',$CP);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('paramPeriodoContable.create')
        		->with('CantidadDias',$this->CantidadDias);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		$validation = Validator::make($input, ClasificacionPeriodo::$rules,ClasificacionPeriodo::$messages,ClasificacionPeriodo::$atributos);
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
			if($ClasificacionPeriodo->save()){
			
			$PeriodoContable = new PeriodoContable;
			$PeriodoContable->CON_PeriodoContable_FechaInicio = Input::get('CON_PeriodoContable_FechaInicio');
			$PeriodoContable->CON_PeriodoContable_FechaFinal = $this->getFinalDate($PeriodoContable->CON_PeriodoContable_FechaInicio,$ClasificacionPeriodo->CON_ClasificacionPeriodo_CatidadDias);
			$PeriodoContable->CON_PeriodoContable_Nombre = Input::get('CON_ClasificacionPeriodo_Nombre');
			$PeriodoContable->CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID = $ClasificacionPeriodo->CON_ClasificacionPeriodo_ID;
			$PeriodoContable->save();
			}
			return Redirect::action('ParamPeriodoContableController@index');
		}

		
	}
	private function getFinalDate($fechaInicio,$dias){
		return date("Y-m-d", strtotime($fechaInicio." +".$dias." day"));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$CP = $this->ClasificacionPeriodo->find($id);

		if (is_null($CP))
		{
			return Redirect::action('ParamPeriodoContableController@index');
		}

        return View::make('paramPeriodoContable.show')
        		->with('ClasificacionPeriodo', $CP);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CP = ClasificacionPeriodo::find($id);
		if (is_null($CP))
		{
			return Redirect::action('ParamPeriodoContableController@index');

		}
		$CP->CON_PeriodoContable_FechaInicio=PeriodoContable::where('CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID','=',$id)->get();
		$CP->CON_PeriodoContable_FechaInicio=strstr($CP->CON_PeriodoContable_FechaInicio[0]['CON_PeriodoContable_FechaInicio'],' ',true);
        return View::make('paramPeriodoContable.edit')
        	->with('ClasificacionPeriodo',$CP)
        	->with('CantidadDias',$this->CantidadDias);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
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
				return Redirect::action('ParamPeriodoContableController@index', $id);
			}
		}

		return Redirect::action('ParamPeriodoContableController@edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
