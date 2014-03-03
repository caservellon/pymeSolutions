<?php

class CategoriaController extends BaseController {

	/**
	 * Categoria Repository
	 *
	 * @var Categoria
	 */
	protected $Categoria;

	public function __construct(Categoria $Categoria)
	{
		$this->Categoria = $Categoria;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Categoria = $this->Categoria->all();

		return View::make('Categoria.index', compact('Categoria'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Categoria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Categoria::$rules);

		if ($validation->passes())
		{
			$this->Categoria->create($input);

			return Redirect::route('Categoria.index');
		}

		return Redirect::route('Categoria.create')
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
		$Categoria = $this->Categoria->findOrFail($id);

		return View::make('Categoria.show', compact('Categoria'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Categoria = $this->Categoria->find($id);

		if (is_null($Categoria))
		{
			return Redirect::route('Categoria.index');
		}

		return View::make('Categoria.edit', compact('Categoria'));
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
		$validation = Validator::make($input, Categoria::$rules);

		if ($validation->passes())
		{
			$Categoria = $this->Categoria->find($id);
			$Categoria->INV_Categoria_ID = $id;
			$Categoria->INV_Categoria_Codigo = Input::get('INV_Categoria_Codigo');
			$Categoria->INV_Categoria_Nombre = Input::get('INV_Categoria_Nombre');
			$Categoria->INV_Categoria_Descripcion = Input::get('INV_Categoria_Descripcion');
			$Categoria->INV_Categoria_HorarioDescuento_ID = Input::get('INV_Categoria_HorarioDescuento_ID');
			$Categoria->INV_Categoria_Activo = Input::get('INV_Categoria_Activo');
			$Categoria->INV_Categoria_IDCategoriaPadre = Input::get('INV_Categoria_IDCategoriaPadre');
			$Categoria->update();

			return Redirect::route('Categoria.show', $id);
		}

		return Redirect::route('Categoria.edit', $id)
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
		$this->Categoria->find($id)->delete();

		return Redirect::route('Categoria.index');
	}

}
