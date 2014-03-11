<?php

class CampoLocalListaController extends BaseController {

	/**
	 * CampoLocalLista Repository
	 *
	 * @var CampoLocalLista
	 */
	protected $CampoLocalLista;

	public function __construct(CampoLocalLista $CampoLocalLista)
	{
		$this->CampoLocalLista = $CampoLocalLista;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CampoLocalLista = $this->CampoLocalLista->all();

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
		$validation = Validator::make($input, CampoLocalLista::$rules);

		if ($validation->passes())
		{
			$this->CampoLocalLista->create($input);

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
		$CampoLocalLista = $this->CampoLocalLista->findOrFail($id);

		return View::make('CampoLocalLista.show', compact('CampoLocalLista'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CampoLocalLista = $this->CampoLocalLista->find($id);

		if (is_null($CampoLocalLista))
		{
			return Redirect::route('CampoLocalLista.index');
		}

		return View::make('CampoLocalLista.edit', compact('CampoLocalLista'));
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
		$validation = Validator::make($input, CampoLocalLista::$rules);

		if ($validation->passes())
		{
			$CampoLocalLista = $this->CampoLocalLista->find($id);
			$CampoLocalLista->update($input);

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
		$this->CampoLocalLista->find($id)->delete();

		return Redirect::route('CampoLocalLista.index');
	}

}
