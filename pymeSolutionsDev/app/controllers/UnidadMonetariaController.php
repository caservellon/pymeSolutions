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
		if (Seguridad::ListarUnidadesMonetarias()) {
			$unidadmonetarias = $this->UnidadMonetaria->all();
        	return View::make('unidadmonetarias.index',compact('unidadmonetarias'));
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
		if (Seguridad::AgregarUnidadesMonetarias()) {
			return View::make('unidadmonetarias.create');
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
		if (Seguridad::AgregarUnidadesMonetarias()) {
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
		if (Seguridad::EditarUnidadesMonetarias()) {
			$UM = $this->UnidadMonetaria->find($id);

			if (is_null($UM))
			{
				return Redirect::action('UnidadMonetariaController@index');
			}
	        return View::make('unidadmonetarias.edit')
	        	->with('UnidadMonetaria',$UM);
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
		if (Seguridad::EditarUnidadesMonetarias()) {
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
		}else{
				return Redirect::to('/403');
		}
	}

}
