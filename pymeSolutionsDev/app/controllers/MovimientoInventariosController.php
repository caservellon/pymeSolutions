<?php

class MovimientoInventariosController extends BaseController {

	/**
	 * MovimientoInventario Repository
	 *
	 * @var MovimientoInventario
	 */
	protected $MovimientoInventario;

	public function __construct(MovimientoInventario $MovimientoInventario)
	{
		$this->MovimientoInventario = $MovimientoInventario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$MovimientoInventarios = $this->MovimientoInventario->all();
		$Productos = Producto::all();
		//$results = DB::select('select * from INV_Categoria where INV_Categoria_ID = ?', array(1));
		return View::make('MovimientoInventarios.index', compact('MovimientoInventarios', 'Productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Productos = Producto::all();
		if ($Productos->count() > 0) {
			$Agregados = Proveedor::all();
			return View::make('MovimientoInventarios.create', compact('Productos'));
			//return View::make('MovimientoInventarios.create', compact('Productos', 'Agregados'));
		}
		return View::make('MovimientoInventarios.vacio');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MovimientoInventario::$rules);
		if ($validation->passes())
		{
			$this->MovimientoInventario->create($input);

			return Redirect::route('Inventario.DetalleMovimiento.create');
		}

		return Redirect::route('Inventario.MovimientoInventario.create')
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
		$MovimientoInventario = $this->MovimientoInventario->findOrFail($id);

		return View::make('MovimientoInventarios.show', compact('MovimientoInventario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$MovimientoInventario = $this->MovimientoInventario->find($id);

		if (is_null($MovimientoInventario))
		{
			return Redirect::route('Inventario.MovimientoInventario.index');
		}

		return View::make('MovimientoInventarios.edit', compact('MovimientoInventario'));
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
		$validation = Validator::make($input, MovimientoInventario::$rules);

		if ($validation->passes())
		{
			$MovimientoInventario = $this->MovimientoInventario->find($id);
			$MovimientoInventario->update($input);

			return Redirect::route('Inventario.MovimientoInventario.show', $id);
		}

		return Redirect::route('Inventario.MovimientoInventario.edit', $id)
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
		$this->MovimientoInventario->find($id)->delete();

		return Redirect::route('Inventario.MovimientoInventario.index');
	}


	public function salida()
	{
		$Productos = Producto::all();
		if ($Productos->count() > 0) {
			return View::make('MovimientoInventarios.createSalida', compact('Productos'));
		}
		return View::make('MovimientoInventarios.vacio');
	}


	public function storeSalida()
	{
		$input = Input::all();
		$validation = Validator::make($input, MovimientoInventario::$rules);

		if ($validation->passes())
		{
			$this->MovimientoInventario->createSalida($input);

			return Redirect::route('Inventario.MovimientoInventario.index');
		}

		return Redirect::route('Inventario.MovimientoInventario.createSalida')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

}
