<?php

class ProductosController extends BaseController {

	/**
	 * Producto Repository
	 *
	 * @var Producto
	 */
	protected $Producto;

	public function __construct(Producto $Producto)
	{
		$this->Producto = $Producto;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Productos = $this->Producto->all();

		return View::make('Productos.index', compact('Productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Producto::$rules);

		if ($validation->passes())
		{
			$this->Producto->create($input);

			return Redirect::route('Inventario.Productos.index');
		}

		return Redirect::route('Inventario.Productos.create')
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
		$Producto = $this->Producto->findOrFail($id);

		return View::make('Productos.show', compact('Producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Producto = $this->Producto->find($id);

		if (is_null($Producto))
		{
			return Redirect::route('Inventario.Productos.index');
		}

		return View::make('Productos.edit', compact('Producto'));
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
		$validation = Validator::make($input, Producto::$rules);

		if ($validation->passes())
		{
			$Producto = $this->Producto->find($id);
			$Producto->update($input);

			return Redirect::route('Inventario.Productos.show', $id);
		}

		return Redirect::route('Inventario.Productos.edit', $id)
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
		$this->Producto->find($id)->delete();

		return Redirect::route('Inventario.Productos.index');
	}

}
