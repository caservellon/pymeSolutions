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
		if (Seguridad::listarCategoria()) {
			//$Categoria = $this->Categoria->all();
			$Categoria = $this->Categoria->where('INV_Categoria_Activo', 1)->get();
			$Categorias = Categoria::all();
			$Horarios = Horario::all();
			return View::make('Categoria.index', compact('Categoria', 'Categorias', 'Horarios'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{

		if (Seguridad::crearCategoria()) {
			$temp = Categoria::where('INV_Categoria_IDCategoriaPadre','=','1')->Where('INV_Categoria_Activo', '=', '1')->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
			$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
			$tipos = $temp;
			return View::make('Categoria.create', compact('tipos', 'horarios'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Seguridad::crearCategoria()) {
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
			} else {
				return Redirect::to('/403');
			}
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
		if (Seguridad::editarCategoria()) {
			$Categoria = $this->Categoria->find($id);
			$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
			//return $tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
			$tipos = Categoria::where('INV_Categoria_IDCategoriaPadre','=','1')->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
			if (is_null($Categoria))
			{
				return Redirect::route('Inventario.Categoria.index', compact('tipos', 'horarios'));
			}
			return View::make('Categoria.edit', compact('Categoria', 'tipos', 'horarios'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		if (Seguridad::editarCategoria()) {
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
				return Redirect::route('Inventario.Categoria.index');
			}
			return Redirect::route('Inventario.Categoria.edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
			} else {
				return Redirect::to('/403');
			}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if (Seguridad::eliminarCategoria()) {
			//$this->Categoria->find($id)->delete();
			$a = Categoria::find($id);
			$a->INV_Categoria_Activo = 0;
			$a->save();

			return Redirect::route('Inventario.Categoria.index');
		} else {
			return Redirect::to('/403');
		}
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
