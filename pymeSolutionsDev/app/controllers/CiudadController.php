<?php

class CiudadController extends BaseController {

	/**
	 * Ciudad Repository
	 *
	 * @var Ciudad
	 */
	protected $Ciudad;

	public function __construct(Ciudad $Ciudad)
	{
		$this->Ciudad = $Ciudad;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Ciudad = $this->Ciudad->all();

		return View::make('Ciudad.index', compact('Ciudad'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Ciudad.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Ciudad::$rules);

		if ($validation->passes())
		{
			$this->Ciudad->create($input);

			return Redirect::route('Ciudad.index');
		}

		return Redirect::route('Ciudad.create')
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
		$Ciudad = $this->Ciudad->findOrFail($id);

		return View::make('Ciudad.show', compact('Ciudad'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Ciudad = $this->Ciudad->find($id);

		if (is_null($Ciudad))
		{
			return Redirect::route('Ciudad.index');
		}

		return View::make('Ciudad.edit', compact('Ciudad'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_method');
		$validation = Validator::make($input, Ciudad::$rules);

		if ($validation->passes())
		{
			$Ciudad = $this->Ciudad->find($id);
			$Ciudad->update($input);

			return Redirect::route('Ciudad.show', $id);
		}

		return Redirect::route('Ciudad.edit', $id)
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
		$this->Ciudad->find($id)->delete();

		return Redirect::route('Ciudad.index');
	}

}
