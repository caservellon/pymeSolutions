<?php

class CatalogoContablesController extends BaseController {

	/**
	 * CatalogoContable Repository
	 *
	 * @var CatalogoContable
	 */
	protected $CatalogoContable;

	public function __construct(CatalogoContable $CatalogoContable)
	{
		$this->CatalogoContable = $CatalogoContable;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Catalogo = $this->CatalogoContable->all();

		return View::make('CatalogoContables.index', compact('Catalogo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CatalogoContables.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, CatalogoContable::$rules);

		if ($validation->passes())
		{
			$this->CatalogoContable->create($input);

			return Redirect::route('catalogo-contable.index');
		}

		return Redirect::route('catalogo-contable.create')
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
		$CatalogoContable = $this->CatalogoContable->findOrFail($id);

		return View::make('CatalogoContables.show', compact('CatalogoContable'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CatalogoContable = $this->CatalogoContable->find($id);

		if (is_null($CatalogoContable))
		{
			return Redirect::route('CatalogoContables.index');
		}

		return View::make('CatalogoContables.edit', compact('CatalogoContable'));
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
		$validation = Validator::make($input, CatalogoContable::$rules);

		if ($validation->passes())
		{
			$CatalogoContable = $this->CatalogoContable->find($id);
			$CatalogoContable->update($input);

			return Redirect::route('CatalogoContables.show', $id);
		}

		return Redirect::route('CatalogoContables.edit', $id)
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
		$this->CatalogoContable->find($id)->delete();

		return Redirect::route('CatalogoContables.index');
	}

}
