<?php

class TipoDocumentosController extends BaseController {

	/**
	 * TipoDocumento Repository
	 *
	 * @var TipoDocumento
	 */
	protected $TipoDocumento;

	public function __construct(TipoDocumento $TipoDocumento)
	{
		$this->TipoDocumento = $TipoDocumento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$TipoDocumentos = $this->TipoDocumento->all();

		return View::make('TipoDocumentos.index', compact('TipoDocumentos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('TipoDocumentos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, TipoDocumento::$rules);

		if ($validation->passes())
		{
			$this->TipoDocumento->create($input);

			return Redirect::route('TipoDocumentos.index');
		}

		return Redirect::route('TipoDocumentos.create')
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
		$TipoDocumento = $this->TipoDocumento->findOrFail($id);

		return View::make('TipoDocumentos.show', compact('TipoDocumento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$TipoDocumento = $this->TipoDocumento->find($id);

		if (is_null($TipoDocumento))
		{
			return Redirect::route('TipoDocumentos.index');
		}

		return View::make('TipoDocumentos.edit', compact('TipoDocumento'));
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
		$validation = Validator::make($input, TipoDocumento::$rules);

		if ($validation->passes())
		{
			$TipoDocumento = $this->TipoDocumento->find($id);
			$TipoDocumento->update($input);

			return Redirect::route('TipoDocumentos.show', $id);
		}

		return Redirect::route('TipoDocumentos.edit', $id)
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
		$this->TipoDocumento->find($id)->delete();

		return Redirect::route('TipoDocumentos.index');
	}

}