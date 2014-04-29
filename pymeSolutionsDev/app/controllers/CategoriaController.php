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
		$temp = Categoria::where('INV_Categoria_IDCategoriaPadre','=','1')->Where('INV_Categoria_Activo', '=', '1')->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
		$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
		$tipos = $temp;
		return View::make('Categoria.create', compact('tipos', 'horarios'));
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
			$Categoria = new Categoria;
			$Categoria->INV_Categoria_Codigo = Input::get('INV_Categoria_Codigo');
			$Categoria->INV_Categoria_Nombre = Input::get('INV_Categoria_Nombre');
			$Categoria->INV_Categoria_Descripcion = Input::get('INV_Categoria_Descripcion');
			$Categoria->INV_Categoria_HorarioDescuento_ID = Input::get('INV_Categoria_HorarioDescuento_ID');
			$Categoria->INV_Categoria_Activo = Input::get('INV_Categoria_Activo');
			$Categoria->INV_Categoria_IDCategoriaPadre = Input::get('INV_Categoria_IDCategoriaPadre');
			$Categoria->INV_Categoria_FechaCreacion = date('Y-m-d H:i:s');
			$Categoria->INV_Categoria_UsuarioCreacion = Input::get('INV_Categoria_UsuarioCreacion');
			$Categoria->INV_Categoria_FechaModificacion = date('Y-m-d H:i:s');
			$Categoria->INV_Categoria_UsuarioModificacion = Input::get('INV_Categoria_UsuarioModificacion');
			$Categoria->save();
			return Redirect::route('Inventario.Categoria.index');
		}

		return Redirect::route('Inventario.Categoria.create')
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
		$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
		$tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
		if (is_null($Categoria))
		{
			return Redirect::route('Inventario.Categoria.index', compact('tipos', 'horarios'));
		}

		return View::make('Categoria.edit', compact('Categoria', 'tipos', 'horarios'));
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
			$Categoria->INV_Categoria_FechaModificacion = date('Y-m-d H:i:s');
			$Categoria->INV_Categoria_UsuarioModificacion = Input::get('INV_Categoria_UsuarioModificacion');
			$Categoria->update();

			return Redirect::route('Inventario.Categoria.show', $id);
		}

		return Redirect::route('Inventario.Categoria.edit', $id)
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

		return Redirect::route('Inventario.Categoria.index');
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
