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
		$tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
      	$combobox = $tipos;

      	$padres = DB::table('INV_Categoria')->lists('INV_Categoria_ID', 'INV_Categoria_Nombre');
      	$hijos = DB::table('INV_Categoria')->lists('INV_Categoria_IDCategoriaPadre', 'INV_Categoria_Nombre');

      	$jpadres = json_encode($padres);
      	$jhijos = json_encode($hijos);

      	//$results = DB::select('select * from users where id = ?', array(1));

      	$idPadre = Input::get('INV_Categoria_IDCategoriaPadre');

      	//$query = DB::table('INV_Categoria')->where('INV_Categoria_IDCategoriaPadre', '3')->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
      	//$combobox2 = $query;
      	$unidad = UnidadMedida::all()->lists('INV_UnidadMedida_Nombre', 'INV_UnidadMedida_ID');
      	$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
		return View::make('Productos.create', compact('combobox', 'horarios', 'unidad', 'jpadres' ,'jhijos'));
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
		$tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
      	$combobox = $tipos;
      	$unidad = UnidadMedida::all()->lists('INV_UnidadMedida_Nombre', 'INV_UnidadMedida_ID');
      	$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
		
		if (is_null($Producto))
		{
			return Redirect::route('Inventario.Productos.index', compact('combobox', 'horarios', 'unidad'));
		}

		return View::make('Productos.edit', compact('Producto', 'combobox', 'horarios', 'unidad'));
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

	public function returnUser()
	{
		
		return 'usuario';
	}

}
