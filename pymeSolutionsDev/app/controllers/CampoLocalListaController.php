<?php

class CampoLocalListaController extends BaseController {

	/**
	 * CampoLocalListum Repository
	 *
	 * @var CampoLocalListum
	 */
	protected $CampoLocalListum;

	public function __construct(CampoLocalListum $CampoLocalListum)
	{
		$this->CampoLocalListum = $CampoLocalListum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CampoLocalLista = $this->CampoLocalListum->all();

		return View::make('CampoLocalLista.index', compact('CampoLocalLista'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CampoLocalLista.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, CampoLocalListum::$rules);

		if ($validation->passes())
		{
			$this->CampoLocalListum->create($input);

			return Redirect::route('CampoLocalLista.index');
		}

		return Redirect::route('CampoLocalLista.create')
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
		$CampoLocalListum = $this->CampoLocalListum->findOrFail($id);

		return View::make('CampoLocalLista.show', compact('CampoLocalListum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CampoLocalListum = $this->CampoLocalListum->find($id);

		if (is_null($CampoLocalListum))
		{
			return Redirect::route('CampoLocalLista.index');
		}

		return View::make('CampoLocalLista.edit', compact('CampoLocalListum'));
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
		$validation = Validator::make($input, CampoLocalListum::$rules);

		if ($validation->passes())
		{
			$CampoLocalListum = $this->CampoLocalListum->find($id);
			$CampoLocalListum->update($input);

			return Redirect::route('CampoLocalLista.show', $id);
		}

		return Redirect::route('CampoLocalLista.edit', $id)
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
		$this->CampoLocalListum->find($id)->delete();

		return Redirect::route('CampoLocalLista.index');
	}

}
