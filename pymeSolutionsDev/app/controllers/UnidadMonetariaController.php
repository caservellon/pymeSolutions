<?php

//Route::get('unidadmonetarias', 'UnidadMonetaria@index');

class UnidadMonetariaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $UnidadMonetaria;

	public function __construct(UnidadMonetaria $UnidadMonetaria){
		$this->UnidadMonetaria = $UnidadMonetaria;
	}

	public function index()
	{
		$unidadmonetarias = $this->UnidadMonetaria->all();
        return View::make('unidadmonetarias.index',compact('unidadmonetarias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('unidadmonetarias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, UnidadMonetaria::$rules);

		if ($validation->fails())
		{
			return Redirect::action('UnidadMonetariaController@create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		}else{
			$this->UnidadMonetaria->create($input);

			return Redirect::action('UnidadMonetariaController@index');
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
		$UM = $this->UnidadMonetaria->find($id);

		if (is_null($UM))
		{
			return Redirect::action('UnidadMonetariaController@index');
		}

        return View::make('unidadmonetarias.show')
        		->with('monetaryUnity', $UM);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$UM = $this->UnidadMonetaria->find($id);

		if (is_null($UM))
		{
			return Redirect::action('UnidadMonetariaController@index');
		}
        return View::make('unidadmonetarias.edit')
        	->with('UnidadMonetaria',$UM);
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
		$validation = Validator::make($input, UnidadMonetaria::$rules);

		if ($validation->passes())
		{
			$Caja = $this->UnidadMonetaria->find($id);
			$Caja->update($input);

			return Redirect::action('UnidadMonetariaController@show', $id);
		}

		return Redirect::action('UnidadMonetariaController@edit', $id)
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
