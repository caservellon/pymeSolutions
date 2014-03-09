<?php

class CampoLocalsController extends BaseController {

	/**
	 * CampoLocal Repository
	 *
	 * @var CampoLocal
	 */
	protected $CampoLocal;

	public function __construct(CampoLocal $CampoLocal)
	{
		$this->CampoLocal = $CampoLocal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CampoLocals = $this->CampoLocal->all();

		return View::make('CampoLocals.index', compact('CampoLocals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CampoLocals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$this->CampoLocal->create($input);

			return Redirect::route('CampoLocals.index');
		}

		return Redirect::route('CampoLocals.create')
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
		$CampoLocal = $this->CampoLocal->findOrFail($id);

		return View::make('CampoLocals.show', compact('CampoLocal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CampoLocal = $this->CampoLocal->find($id);

		if (is_null($CampoLocal))
		{
			return Redirect::route('CampoLocals.index');
		}

		return View::make('CampoLocals.edit', compact('CampoLocal'));
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
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$CampoLocal = $this->CampoLocal->find($id);
			$CampoLocal->update($input);

			return Redirect::route('CampoLocals.show', $id);
		}

		return Redirect::route('CampoLocals.edit', $id)
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
		$this->CampoLocal->find($id)->delete();

		return Redirect::route('CampoLocals.index');
	}

}
