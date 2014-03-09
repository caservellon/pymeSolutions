<?php

class ProveedorController extends BaseController {

	/**
	 * Proveedor Repository
	 *
	 * @var Proveedor
	 */
	protected $Proveedor;

	public function __construct(Proveedor $Proveedor)
	{
		$this->Proveedor = $Proveedor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Proveedor = $this->Proveedor->all();

		return View::make('Proveedor.index', compact('Proveedor'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Proveedor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Proveedor::$rules);

		if ($validation->passes())
		{
			$this->Proveedor->create($input);

			return Redirect::route('Inventario.Proveedor.index');
		}

		return Redirect::route('Inventario.Proveedor.create')
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
		$Proveedor = $this->Proveedor->findOrFail($id);

		return View::make('Proveedor.show', compact('Proveedor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Proveedor = $this->Proveedor->find($id);

		if (is_null($Proveedor))
		{
			return Redirect::route('Inventario.Proveedor.index');
		}

		return View::make('Proveedor.edit', compact('Proveedor'));
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
		$validation = Validator::make($input, Proveedor::$rules);

		if ($validation->passes())
		{
			$Proveedor = $this->Proveedor->find($id);
			$Proveedor->update($input);

			return Redirect::route('Inventario.Proveedor.show', $id);
		}

		return Redirect::route('Inventario.Proveedor.edit', $id)
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
		$this->Proveedor->find($id)->delete();

		return Redirect::route('Inventario.Proveedor.index');
	}

}
