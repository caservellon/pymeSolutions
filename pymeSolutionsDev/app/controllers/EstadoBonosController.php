<?php

class EstadoBonosController extends BaseController {

	/**
	 * EstadoBono Repository
	 *
	 * @var EstadoBono
	 */
	protected $EstadoBono;

	public function __construct(EstadoBono $EstadoBono)
	{
		$this->EstadoBono = $EstadoBono;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$EstadoBonos = $this->EstadoBono->all();

		return View::make('EstadoBonos.index', compact('EstadoBonos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('EstadoBonos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, EstadoBono::$rules);

		if ($validation->passes())
		{
			$this->EstadoBono->create($input);

			return Redirect::route('EstadoBonos.index');
		}

		return Redirect::route('EstadoBonos.create')
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
		$EstadoBono = $this->EstadoBono->findOrFail($id);

		return View::make('EstadoBonos.show', compact('EstadoBono'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$EstadoBono = $this->EstadoBono->find($id);

		if (is_null($EstadoBono))
		{
			return Redirect::route('EstadoBonos.index');
		}

		return View::make('EstadoBonos.edit', compact('EstadoBono'));
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
		$validation = Validator::make($input, EstadoBono::$rules);

		if ($validation->passes())
		{
			$EstadoBono = $this->EstadoBono->find($id);
			$EstadoBono->update($input);

			return Redirect::route('EstadoBonos.show', $id);
		}

		return Redirect::route('EstadoBonos.edit', $id)
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
		$this->EstadoBono->find($id)->delete();

		return Redirect::route('EstadoBonos.index');
	}

}
