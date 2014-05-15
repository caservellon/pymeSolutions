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
		$temp = MotivoMovimiento::where('INV_MotivoMovimiento_TipoMovimiento', '=', '0')->where('INV_MotivoMovimiento_Activo', '=', '1')->get();
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

	public function ordenes(){
		$idOrdenes = HistorialEstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstAct','=','9')->lists('COM_TransicionEstado_IdOrdenCompra');
		$ordenes = OrdenCompra::wherein('COM_OrdenCompra_IdOrdenCompra',$idOrdenes)->lists('COM_OrdenCompra_Codigo');
		$proveedores = Proveedor::all();
		
		$orden = array();
		return View::make('MovimientoInventarios.orden', compact('orden', 'ordenes', 'proveedores'));
	}

	public function search(){
		$CodigoOrdenCompra = Input::get('search');
		//$orden = Helper::InformacionProductosOrdenCompra('1');
		//return $orden;
		/*$orden = DB::table('COM_OrdenCompra')
			-> join('COM_DetalleOrdenCompra', 'COM_OrdenCompra.COM_OrdenCompra_IdOrdenCompra', '=', 'COM_DetalleOrdenCompra.COM_OrdenCompra_idOrdenCompra')
			-> join('INV_Producto', 'COM_DetalleOrdenCompra.COM_Producto_idProducto', '=', 'INV_Producto.INV_Producto_ID')
			-> select('INV_Producto.INV_Producto_Codigo as Codigo',
					  'INV_Producto.INV_Producto_Nombre as Nombre',
					  'INV_Producto.INV_Producto_Descripcion as Descripcion',
					  'COM_DetalleOrdenCompra.COM_DetalleOrdenCompra_Cantidad as Cantidad',
					  'COM_DetalleOrdenCompra.COM_DetalleOrdenCompra_PrecioUnitario as Precio'
					  )
			-> where('COM_OrdenCompra.COM_OrdenCompra_Codigo', '=', $CodigoOrdenCompra)
			-> get();*/
		$ordenes = OrdenCompra::all();
		$proveedores = Proveedor::all();
		$orden = DB::select('select pro.INV_Producto_ID as ID, pro.INV_Producto_Nombre as Nombre, 
					det.COM_DetalleOrdenCompra_Cantidad as Cantidad, det.COM_DetalleOrdenCompra_PrecioUnitario as Precio
					from pymeERP.COM_OrdenCompra com inner join pymeERP.COM_DetalleOrdenCompra det on 
					com.COM_OrdenCompra_IdOrdenCompra = det.COM_OrdenCompra_idOrdenCompra
					inner join pymeERP.INV_Producto pro on det.COM_Producto_idProducto = pro.INV_Producto_ID
					where com.COM_OrdenCompra_Codigo = ?', array($CodigoOrdenCompra));
		//return $orden;
		return View::make('MovimientoInventarios.orden', compact('orden', 'ordenes', 'proveedores', 'CodigoOrdenCompra'));
	}

}
