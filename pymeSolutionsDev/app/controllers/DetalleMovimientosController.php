<?php

class DetalleMovimientosController extends BaseController {

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

		return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Productos = Producto::all();
		$id = MovimientoInventario::all()->count();
		//$Motivo = MovimientoInventario::find($id);
		$Motivo = MovimientoInventario::find(0);
		//return $Motivo;
		return View::make('DetalleMovimientos.create', compact('Productos', 'Motivo', 'id'));
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
			/*if (Input::get('Incluir')) {
				$Detalle = new DetalleMovimiento;
				$Detalle->INV_DetalleMovimiento_IDProducto = Input::get('INV_DetalleMovimiento_IDProducto');
				$Detalle->INV_DetalleMovimiento_CodigoProducto = Input::get('INV_DetalleMovimiento_CodigoProducto');
				$Detalle->INV_DetalleMovimiento_NombreProducto = Input::get('INV_DetalleMovimiento_NombreProducto');
				$Detalle->INV_DetalleMovimiento_CantidadProducto = Input::get('INV_DetalleMovimiento_CantidadProducto');
				$Detalle->INV_DetalleMovimiento_PrecioCosto = Input::get('INV_DetalleMovimiento_PrecioCosto');
				$Detalle->INV_DetalleMovimiento_PrecioVenta = Input::get('INV_DetalleMovimiento_PrecioVenta');
				$Detalle->INV_DetalleMovimiento_FechaCreacion = Input::get('INV_DetalleMovimiento_FechaCreacion');
				$Detalle->INV_DetalleMovimiento_FechaModificacion = Input::get('INV_DetalleMovimiento_FechaModificacion');
				$Detalle->INV_Movimiento_ID = Input::get('INV_Movimiento_ID');
				$Detalle->INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID = Input::get('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID');
				$Detalle->INV_Producto_INV_Producto_ID = Input::get('INV_Producto_INV_Producto_ID');
				$Detalle->INV_Producto_INV_Categoria_ID = Input::get('INV_Producto_INV_Categoria_ID');
				$Detalle->INV_Producto_INV_Categoria_IDCategoriaPadre = Input::get('INV_Producto_INV_Categoria_IDCategoriaPadre');
				$Detalle->INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID = Input::get('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID');
				$Detalle->save();
			}*/
			//return $input;
			//$Productos = Producto::all();
			//$id = MovimientoInventario::all()->count();
			//$Motivo = MovimientoInventario::find($id);
			//$Motivo = MovimientoInventario::find(0);
		
			//$DetalleMovimiento->create($input);
			$this->DetalleMovimiento->create($input);
			//return View::make('DetalleMovimientos.create', compact('Productos', 'Motivo', 'id'));
			return Redirect::route('Inventario.DetalleMovimiento.create');
		}

		return Redirect::route('Inventario.DetalleMovimiento.create')
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

		return View::make('DetalleMovimientos.show', compact('DetalleMovimiento'));
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
			return Redirect::route('Inventario.DetalleMovimiento.index');
		}

		return View::make('DetalleMovimientos.edit', compact('DetalleMovimiento'));
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

			return Redirect::route('Inventario.DetalleMovimiento.show', $id);
		}

		return Redirect::route('Inventario.DetalleMovimiento.edit', $id)
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

		return Redirect::route('Inventario.DetalleMovimiento.index');
	}


	public function agregar($id){
		//return $id;
		$idMotivo = MovimientoInventario::all()->count();
		//$Motivo = MovimientoInventario::find($idMotivo);
		$Motivo = MovimientoInventario::find(0);

		$Producto = Producto::find($id);
		//return $Producto;
		/*
		$Detalle->INV_DetalleMovimiento_IDProducto = $id;
		$Detalle->INV_DetalleMovimiento_CodigoProducto = $Producto->INV_Producto_Codigo;
		$Detalle->INV_DetalleMovimiento_NombreProducto = $Producto->INV_Producto_Nombre;
		$Detalle->INV_DetalleMovimiento_CantidadProducto = $Producto->;
		$Detalle->INV_DetalleMovimiento_PrecioCosto = $Producto->;
		$Detalle->INV_DetalleMovimiento_PrecioVenta = $Producto->;
		$Detalle->INV_DetalleMovimiento_FechaCreacion = $Producto->;
		$Detalle->INV_DetalleMovimiento_FechaModificacion = $Producto->;
		$Detalle->INV_Movimiento_ID = $Producto->;
		$Detalle->INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID = $Producto->;
		$Detalle->INV_Producto_INV_Producto_ID = $Producto->;
		$Detalle->INV_Producto_INV_Categoria_ID = $Producto->;
		$Detalle->INV_Producto_INV_Categoria_IDCategoriaPadre = $Producto->;
		$Detalle->INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID = $Producto->;
		$Detalle->save();
		*/
		return View::make('DetalleMovimientos.agregar', compact('Producto', 'Motivo'));
	}

}
