<?php

class CuentaMotivosController extends BaseController {

	/**
	 * CuentaMotivo Repository
	 *
	 * @var CuentaMotivo
	 */
	protected $CuentaMotivo;

	public function __construct(CuentaMotivo $CuentaMotivo)
	{
		$this->CuentaMotivo = $CuentaMotivo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CuentaMotivos = $this->CuentaMotivo->all();

		return View::make('CuentaMotivos.index', compact('CuentaMotivos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CuentaMotivos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, CuentaMotivo::$rules);

		if ($validation->passes())
		{
			$this->CuentaMotivo->create($input);

			return Redirect::action('CuentaMotivosController@index');
		}

		return Redirect::action('CuentaMotivosController@create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$CuentaMotivo = $this->CuentaMotivo->findOrFail($id);

		return View::make('CuentaMotivos.show', compact('CuentaMotivo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CuentaMotivo = $this->CuentaMotivo->find($id);

		if (is_null($CuentaMotivo))
		{
			return Redirect::route('CuentaMotivos.index');
		}

		return View::make('CuentaMotivos.edit', compact('CuentaMotivo'));
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
		$validation = Validator::make($input, CuentaMotivo::$rules);

		if ($validation->passes())
		{
			$CuentaMotivo = $this->CuentaMotivo->find($id);
			$CuentaMotivo->update($input);

			return Redirect::route('CuentaMotivos.show', $id);
		}

		return Redirect::route('CuentaMotivos.edit', $id)
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
		$this->CuentaMotivo->find($id)->delete();

		return Redirect::route('CuentaMotivos.index');
	}

}
