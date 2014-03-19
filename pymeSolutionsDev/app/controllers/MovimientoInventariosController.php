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
		return View::make('MovimientoInventarios.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Productos = Producto::all();
		$temp = MotivoMovimiento::where('INV_MotivoMovimiento_TipoMovimiento', '=', '0')->get();
		$Motivos = $temp->lists('INV_MotivoMovimiento_Nombre', 'INV_MotivoMovimiento_ID');
		
		if ($Productos->count() > 0 & $temp->count() > 0) {
			$Agregados = Proveedor::all();
			return View::make('MovimientoInventarios.create', compact('Productos', 'Motivos'));
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
		$Productos = Producto::all();
		return Redirect::route('Inventario.MovimientoInventario.create', compact('Productos'))
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


	public function detalles($id){
		//$Movimiento = DB::select('select * from INV_Movimiento where INV_Movimiento_ID = ?', array($id));
		$Movimiento = MovimientoInventario::find($id);
		$Detalles = DB::select('select * from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		$temp = DB::select('select INV_MotivoMovimiento_Nombre from INV_MotivoMovimiento where INV_MotivoMovimiento_ID = (select INV_MotivoMovimiento_INV_MotivoMovimiento_ID from INV_Movimiento where INV_Movimiento_ID = ?)', array($id));
		foreach ($temp as $key) {
			$Motivo = $key->INV_MotivoMovimiento_Nombre;
		}
		//return $Motivo;
		return View::make('MovimientoInventarios.terminar', compact('Movimiento', 'Detalles', 'Motivo'));
	}


	public function entradas(){
		$MovimientoInventarios = DB::select('select * from INV_Movimiento where INV_MotivoMovimiento_INV_MotivoMovimiento_ID not in (select INV_MotivoMovimiento_ID from INV_MotivoMovimiento where INV_MotivoMovimiento_TipoMovimiento = 1)');
		$Motivos = MotivoMovimiento::all();
		return View::make('MovimientoInventarios.entradas', compact('Motivos', 'MovimientoInventarios'));
	}

	public function salidas(){
		$MovimientoInventarios = DB::select('select * from INV_Movimiento where INV_MotivoMovimiento_INV_MotivoMovimiento_ID not in (select INV_MotivoMovimiento_ID from INV_MotivoMovimiento where INV_MotivoMovimiento_TipoMovimiento = 0)');
		$Motivos = MotivoMovimiento::all();
		return View::make('MovimientoInventarios.salidas', compact('Motivos', 'MovimientoInventarios'));
	}

}
