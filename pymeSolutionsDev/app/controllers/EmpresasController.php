<?php

class EmpresasController extends BaseController {

	/**
	 * Empresa Repository
	 *
	 * @var Empresa
	 */
	protected $Empresa;

	public function __construct(Empresa $Empresa)
	{
		$this->Empresa = $Empresa;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Empresas = $this->Empresa->all();

		return View::make('Empresas.index', compact('Empresas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Empresas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Empresa::$rules);

		if ($validation->passes())
		{
			$this->Empresa->create($input);

			return Redirect::route('Empresas.index');
		}

		return Redirect::route('Empresas.create')
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
		$Empresa = $this->Empresa->findOrFail($id);

		return View::make('Empresas.show', compact('Empresa'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Empresa = $this->Empresa->find($id);

		if (is_null($Empresa))
		{
			return Redirect::route('Empresas.index');
		}

		return View::make('Empresas.edit', compact('Empresa'));
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
		$validation = Validator::make($input, Empresa::$rules);

		if ($validation->passes())
		{
			$Empresa = $this->Empresa->find($id);
			$Empresa->update($input);

			return Redirect::route('Empresas.index', $id);
		}

		return Redirect::route('Empresas.edit', $id)
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
		$this->Empresa->find($id)->delete();

		return Redirect::route('Empresas.index');
	}

}
