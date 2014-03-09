<?php

class ValorCampoLocalCRMsController extends BaseController {

	/**
	 * ValorCampoLocalCRM Repository
	 *
	 * @var ValorCampoLocalCRM
	 */
	protected $ValorCampoLocalCRM;

	public function __construct(ValorCampoLocalCRM $ValorCampoLocalCRM)
	{
		$this->ValorCampoLocalCRM = $ValorCampoLocalCRM;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ValorCampoLocalCRMs = $this->ValorCampoLocalCRM->all();

		return View::make('ValorCampoLocalCRMs.index', compact('ValorCampoLocalCRMs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ValorCampoLocalCRMs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ValorCampoLocalCRM::$rules);

		if ($validation->passes())
		{
			$this->ValorCampoLocalCRM->create($input);

			return Redirect::route('ValorCampoLocalCRMs.index');
		}

		return Redirect::route('ValorCampoLocalCRMs.create')
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
		$ValorCampoLocalCRM = $this->ValorCampoLocalCRM->findOrFail($id);

		return View::make('ValorCampoLocalCRMs.show', compact('ValorCampoLocalCRM'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ValorCampoLocalCRM = $this->ValorCampoLocalCRM->find($id);

		if (is_null($ValorCampoLocalCRM))
		{
			return Redirect::route('ValorCampoLocalCRMs.index');
		}

		return View::make('ValorCampoLocalCRMs.edit', compact('ValorCampoLocalCRM'));
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
		$validation = Validator::make($input, ValorCampoLocalCRM::$rules);

		if ($validation->passes())
		{
			$ValorCampoLocalCRM = $this->ValorCampoLocalCRM->find($id);
			$ValorCampoLocalCRM->update($input);

			return Redirect::route('ValorCampoLocalCRMs.show', $id);
		}

		return Redirect::route('ValorCampoLocalCRMs.edit', $id)
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
		$this->ValorCampoLocalCRM->find($id)->delete();

		return Redirect::route('ValorCampoLocalCRMs.index');
	}

}
