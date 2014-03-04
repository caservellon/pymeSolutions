<?php

class ParamPeriodoContableController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $ClasificacionPeriodo, $PeriodoContable;

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
        return View::make('paramPeriodoContable.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ClasificacionPeriodo::$rules);

		if ($validation->fails())
		{
			return Redirect::action('ParamPeriodoContableController@create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		}else{
			$this->ClasificacionPeriodo->create($input);

			return Redirect::action('ParamPeriodoContableController@index');
		}

		
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
		$CP = $this->ClasificacionPeriodo->find($id);

		if (is_null($CP))
		{
			return Redirect::action('ParamPeriodoContableController@index');
		}
        return View::make('paramPeriodoContable.edit')
        	->with('ClasificacionPeriodo',$CP);
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
		$validation = Validator::make($input, ClasificacionPeriodo::$rules);

		if ($validation->passes())
		{
			$Caja = $this->ClasificacionPeriodo->find($id);
			$Caja->update($input);

			return Redirect::action('ParamPeriodoContableController@show', $id);
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