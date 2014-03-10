<?php

class DetalleAsientosController extends BaseController {

	/**
	 * DetalleAsiento Repository
	 *
	 * @var DetalleAsiento
	 */
	protected $DetalleAsiento;

	public function __construct(DetalleAsiento $DetalleAsiento)
	{
		$this->DetalleAsiento = $DetalleAsiento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$DetalleAsientos = $this->DetalleAsiento->all();

		return View::make('DetalleAsientos.index', compact('DetalleAsientos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('DetalleAsientos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, DetalleAsiento::$rules);

		if ($validation->passes())
		{
			$this->DetalleAsiento->create($input);

			return Redirect::action('DetalleAsientosController@index');
		}

		return Redirect::action('DetalleAsientosController@create')
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
		$DetalleAsiento = $this->DetalleAsiento->findOrFail($id);

		return View::action('DetalleAsientosController@show', compact('DetalleAsiento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DetalleAsiento = $this->DetalleAsiento->find($id);

		if (is_null($DetalleAsiento))
		{
			return Redirect::route('DetalleAsientos.index');
		}

		return View::action('DetalleAsientosController@edit', compact('DetalleAsiento'));
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
		$validation = Validator::make($input, DetalleAsiento::$rules);

		if ($validation->passes())
		{
			$DetalleAsiento = $this->DetalleAsiento->find($id);
			$DetalleAsiento->update($input);

			return Redirect::route('DetalleAsientos.show', $id);
		}

		return Redirect::route('DetalleAsientos.edit', $id)
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
		$this->DetalleAsiento->find($id)->delete();

		return Redirect::route('DetalleAsientos.index');
	}

}
