<?php

class DetalleSalidasController extends BaseController {

	/**
	 * DetalleMovimiento Repository
	 *
	 * @var DetalleMovimiento
	 */
	protected $DetalleMovimiento;

	public function __construct(DetalleMovimiento $DetalleMovimiento)
	{
		$this->DetalleMovimiento = $DetalleMovimiento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$DetalleMovimientos = $this->DetalleMovimiento->all();

		return View::make('DetalleSalidas.index', compact('DetalleMovimientos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$Productos = Producto::all();
		//$Productos = DB::select('select * from INV_Producto where INV_Producto_ID = ? and INV_Producto_ID is not in ?', array(0));
		//$id = MovimientoInventario::all()->count();
		$temp = DB::select('select INV_Movimiento_ID from INV_Movimiento order by INV_Movimiento_ID desc limit 1');
		$id = 0;
		foreach ($temp as $key) {
			$id = $key->INV_Movimiento_ID;
		}
		//return $id;
		$Motivo = MovimientoInventario::find($id);
		//$Motivo = MovimientoInventario::find(0);
		//return $Motivo;
		$results = DB::select('select * from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//$results = DB::select('select * from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array(0));
		//$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array(0));
		$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//return $idProductos;
		$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array($id));
		//$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(0));
		return View::make('DetalleSalidas.create', compact('Productos', 'Motivo', 'id', 'results'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, DetalleMovimiento::$rules);
		
		if ($validation->passes())
		{
			
			$Producto = Producto::find(Input::get('INV_DetalleMovimiento_IDProducto'));
			if ($Producto->INV_Producto_Cantidad < Input::get('INV_DetalleMovimiento_CantidadProducto')) {
				return Redirect::route('Inventario.DetalleSalida.create')
					->withInput()
					->withErrors('Ingrese una cantidad menor')
					->with('message', 'Cantidad muy Grande');
			}
			//Calcular Precio de Costo
			//$Producto->INV_Producto_PrecioCosto = Input::get('INV_DetalleMovimiento_PrecioCosto');
			
			$Producto->INV_Producto_Cantidad = $Producto->INV_Producto_Cantidad - Input::get('INV_DetalleMovimiento_CantidadProducto');
			$Producto->save();
			$this->DetalleMovimiento->create($input);
			//return View::make('DetalleSalidas.create', compact('Productos', 'Motivo', 'id'));
			return Redirect::route('Inventario.DetalleSalida.create');
		}
		//return 'no';
		return Redirect::route('Inventario.DetalleSalida.create')
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
		$DetalleMovimiento = $this->DetalleMovimiento->findOrFail($id);

		return View::make('DetalleSalidas.show', compact('DetalleMovimiento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DetalleMovimiento = $this->DetalleMovimiento->find($id);

		if (is_null($DetalleMovimiento))
		{
			return Redirect::route('Inventario.DetalleSalida.index');
		}

		return View::make('DetalleSalidas.edit', compact('DetalleMovimiento'));
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
		$validation = Validator::make($input, DetalleMovimiento::$rules);

		if ($validation->passes())
		{
			$DetalleMovimiento = $this->DetalleMovimiento->find($id);
			$DetalleMovimiento->update($input);

			return Redirect::route('Inventario.DetalleSalida.show', $id);
		}

		return Redirect::route('Inventario.DetalleSalida.edit', $id)
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
		$this->DetalleMovimiento->find($id)->delete();

		return Redirect::route('Inventario.DetalleSalida.index');
	}


	public function agregar($id){
		//return $id;
		//$idMotivo = MovimientoInventario::all()->count();
		$temp = DB::select('select INV_Movimiento_ID from INV_Movimiento order by INV_Movimiento_ID desc limit 1');
		$idMotivo = 0;
		foreach ($temp as $key) {
			$idMotivo = $key->INV_Movimiento_ID;
		}
		$Motivo = MovimientoInventario::find($idMotivo);
		//$Motivo = MovimientoInventario::find(0);

		$Producto = Producto::find($id);
		
		return View::make('DetalleSalidas.agregar', compact('Producto', 'Motivo'));
	}


	public function search(){
		//$id = MovimientoInventario::all()->count();
		$temp = DB::select('select INV_Movimiento_ID from INV_Movimiento order by INV_Movimiento_ID desc limit 1');
		$id = 0;
		foreach ($temp as $key) {
			$id = $key->INV_Movimiento_ID;
		}
		$Motivo = MovimientoInventario::find($id);
		//$Motivo = MovimientoInventario::find(0);
		//return $Motivo;
		$results = DB::select('select * from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//$results = DB::select('select * from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array(0));
		//$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array(0));
		$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//return $idProductos;
		if(Input::get('search')=='')
			$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(0));
		else 
			$Productos = DB::select('select * from INV_Producto where (INV_Producto_Nombre = ? or INV_Producto_Codigo = ?) and INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(Input::get('search'), Input::get('search'), $id));
		//$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(0));
		//$Productos = Producto::where('INV_Producto_ID', '=', Input::get('search'))->orWhere('INV_Producto_Codigo', '=', Input::get('search'))->orWhere('INV_Producto_Nombre', '=', Input::get('search'))->get();
		//return DB::select('select * from INV_Producto where INV_Producto_Nombre = ? and INV_Producto_ID = ?',array(Input::get('search'), Input::get('search')));
		return View::make('DetalleSalidas.create', compact('Productos', 'Motivo', 'id', 'results'));
	}

}
