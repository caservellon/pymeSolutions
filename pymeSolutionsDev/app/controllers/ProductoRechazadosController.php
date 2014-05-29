<?php

class ProductoRechazadosController extends BaseController {

	/**
	 * ProductoRechazado Repository
	 *
	 * @var ProductoRechazado
	 */
	protected $ProductoRechazado;

	public function __construct(ProductoRechazado $ProductoRechazado)
	{
		$this->ProductoRechazado = $ProductoRechazado;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ProductoRechazados = $this->ProductoRechazado->all();
		$Productos = Producto::all();

		return View::make('ProductoRechazados.index', compact('ProductoRechazados', 'Productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ProductoRechazados = $this->ProductoRechazado->all();
		$Productos = Producto::all();

		return View::make('ProductoRechazados.index', compact('ProductoRechazados', 'Productos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ProductoRechazado::$rules);

		if ($validation->passes())
		{
			$this->ProductoRechazado->create($input);

			return Redirect::route('ProductosRechazados.index');
		}

		return Redirect::route('ProductosRechazados.create')
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
		$ProductoRechazado = $this->ProductoRechazado->findOrFail($id);

		return View::make('ProductoRechazados.show', compact('ProductoRechazado'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ProductoRechazado = $this->ProductoRechazado->find($id);

		if (is_null($ProductoRechazado))
		{
			return Redirect::route('ProductosRechazados.index');
		}

		return View::make('ProductoRechazados.edit', compact('ProductoRechazado'));
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
		$validation = Validator::make($input, ProductoRechazado::$rules);

		if ($validation->passes())
		{
			$ProductoRechazado = $this->ProductoRechazado->find($id);
			$ProductoRechazado->update($input);

			return Redirect::route('ProductosRechazados.show', $id);
		}

		return Redirect::route('ProductosRechazados.edit', $id)
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
		$this->ProductoRechazado->find($id)->delete();

		return Redirect::route('ProductosRechazados.index');
	}

}
