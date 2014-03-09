<?php

class ValorCampoLocalsController extends BaseController {

	/**
	 * ValorCampoLocal Repository
	 *
	 * @var ValorCampoLocal
	 */
	protected $ValorCampoLocal;

	public function __construct(ValorCampoLocal $ValorCampoLocal)
	{
		$this->ValorCampoLocal = $ValorCampoLocal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ValorCampoLocals = $this->ValorCampoLocal->all();

		return View::make('ValorCampoLocals.index', compact('ValorCampoLocals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ValorCampoLocals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ValorCampoLocal::$rules);

		if ($validation->passes())
		{
			$this->ValorCampoLocal->create($input);

			return Redirect::route('ValorCampoLocals.index');
		}

		return Redirect::route('ValorCampoLocals.create')
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
		$ValorCampoLocal = $this->ValorCampoLocal->findOrFail($id);

		return View::make('ValorCampoLocals.show', compact('ValorCampoLocal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ValorCampoLocal = $this->ValorCampoLocal->find($id);

		if (is_null($ValorCampoLocal))
		{
			return Redirect::route('ValorCampoLocals.index');
		}

		return View::make('ValorCampoLocals.edit', compact('ValorCampoLocal'));
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
		$validation = Validator::make($input, ValorCampoLocal::$rules);

		if ($validation->passes())
		{
			$ValorCampoLocal = $this->ValorCampoLocal->find($id);
			$ValorCampoLocal->update($input);

			return Redirect::route('ValorCampoLocals.show', $id);
		}

		return Redirect::route('ValorCampoLocals.edit', $id)
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
		$this->ValorCampoLocal->find($id)->delete();

		return Redirect::route('ValorCampoLocals.index');
	}

}
