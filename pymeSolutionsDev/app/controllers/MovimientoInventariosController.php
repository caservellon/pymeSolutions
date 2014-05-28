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
		//$idOrdenes = HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=','9')->lists('COM_OrdenCompra_TransicionEstado_Id');
		$idOrdenes = comInventario::getOrdenes();
		$ordenes = array();
		if ($idOrdenes) {
			$temp = OrdenCompra::wherein('COM_OrdenCompra_IdOrdenCompra',$idOrdenes);
			$ordenes = $temp->get();
		}
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
		if ($CodigoOrdenCompra == "") {
			return Redirect::route('Inventario.MovimientoInventario.Orden');
		}
		$ordenes = OrdenCompra::all();
		$proveedores = Proveedor::all();
		/*$orden = DB::select('select pro.INV_Producto_ID as ID, pro.INV_Producto_Nombre as Nombre, 
					det.COM_DetalleOrdenCompra_Cantidad as Cantidad, det.COM_DetalleOrdenCompra_PrecioUnitario as Precio
					from pymeERP.COM_OrdenCompra com inner join pymeERP.COM_DetalleOrdenCompra det on 
					com.COM_OrdenCompra_IdOrdenCompra = det.COM_DetalleOrdenCompra_idOrdenCompra
					inner join pymeERP.INV_Producto pro on det.COM_Producto_idProducto = pro.INV_Producto_ID
					where com.COM_OrdenCompra_Codigo = ?', array($CodigoOrdenCompra));
		//*/
		$orden = comInventario::InformacionProductosOrdenCompra($CodigoOrdenCompra);
		if ($orden) {
			$idOrden = $orden[0]->idOrden;
			return View::make('MovimientoInventarios.orden', compact('orden', 'ordenes', 'proveedores', 'CodigoOrdenCompra', 'idOrden'));
		}
		//return $orden;
		return Redirect::route('Inventario.MovimientoInventario.Orden')
			->withErrors('No se encontraron Órdenes con ese código!');
	}

	public function recibida(){
		$input = Input::all();
		//return $input;
		/*$orden = DB::select('select pro.INV_Producto_ID as ID, pro.INV_Producto_Nombre as Nombre, 
					det.COM_DetalleOrdenCompra_Cantidad as Cantidad, det.COM_DetalleOrdenCompra_PrecioUnitario as Precio
					from pymeERP.COM_OrdenCompra com inner join pymeERP.COM_DetalleOrdenCompra det on 
					com.COM_OrdenCompra_IdOrdenCompra = det.COM_OrdenCompra_idOrdenCompra
					inner join pymeERP.INV_Producto pro on det.COM_Producto_idProducto = pro.INV_Producto_ID
					where com.COM_OrdenCompra_IdOrdenCompra = ?', array($input['INV_Movimiento_IDOrdenCompra']));
		//*/
		$CodigoOrdenCompra = $input['COM_OrdenCompra_Codigo'];
		$IdMovimiento = $input['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'];
		$IdOrdenCompra = $input['INV_Movimiento_IDOrdenCompra'];
		$orden = comInventario::InformacionProductosOrdenCompra($CodigoOrdenCompra);
		$isv = 0;
		if ($orden) {
			$isv = $orden[0]->isv;
		}
		unset($input['COM_OrdenCompra_Codigo']);

		//Se crea el Movimiento de Inventario para despues agregar el detalle del movimiento
		$this->MovimientoInventario->create($input);

		//Buscamos el moviemiento que acabamos de crear para poder obtener su id
		$temp = MovimientoInventario::where('INV_Movimiento_IDOrdenCompra', $input['INV_Movimiento_IDOrdenCompra'])->orderBy('INV_Movimiento_ID', 'DESC')->get();
		$Movimiento = $temp[0];
		$monto = 0;
		//se procede a llenar los detalles de Movimiento de Inventario
		foreach ($orden as $or) {
			//Buscamos el Producto a Agregar
			$Producto = Producto::find($or->ID);
			//return $Producto;
			//Calculando Precio Costo con Promedio Ponderado
			$Costo = (($Producto->INV_Producto_Cantidad * $Producto->INV_Producto_PrecioCosto) + ($or->Cantidad * $or->Precio))/($or->Cantidad + $Producto->INV_Producto_Cantidad);
			//Agregamos los detalles a un array
			$detalle['INV_DetalleMovimiento_IDProducto'] = $or->ID;
			$detalle['INV_DetalleMovimiento_CodigoProducto'] = $Producto->INV_Producto_Codigo;
			$detalle['INV_DetalleMovimiento_NombreProducto'] = $Producto->INV_Producto_Nombre;
			$detalle['INV_DetalleMovimiento_CantidadProducto'] = $or->Cantidad;
			$detalle['INV_DetalleMovimiento_PrecioCosto'] = $or->Precio;
			$detalle['INV_DetalleMovimiento_PrecioVenta'] = $Producto->INV_Producto_PrecioVenta;
			$detalle['INV_DetalleMovimiento_FechaCreacion'] = date('Y-m-d H:i:s');
			$detalle['INV_DetalleMovimiento_FechaModificacion'] = date('Y-m-d H:i:s');
			$detalle['INV_DetalleMovimiento_UsuarioCreacion'] = 'Admin';
			$detalle['INV_DetalleMovimiento_UsuarioModificacion'] = 'Admin';
			$detalle['INV_Movimiento_ID'] = $Movimiento->INV_Movimiento_ID;
			$detalle['INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '2';
			$detalle['INV_Producto_INV_Producto_ID'] = $Producto->INV_Producto_ID;
			$detalle['INV_Producto_INV_Categoria_ID'] = $Producto->INV_Categoria_ID;
			$detalle['INV_Producto_INV_Categoria_IDCategoriaPadre'] = $Producto->INV_Categoria_IDCategoriaPadre;
			$detalle['INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID'] = $Producto->INV_UnidadMedida_ID;
			//return $detalle;

			//Se suma el monto del produto para generar la contabilidad
			$monto += ($or->Cantidad * $or->Precio);

			//Creamos el detalle para un solo producto
			DetalleMovimiento::create($detalle);

			//Actualizamos el Inventario
			$Producto->INV_Producto_Cantidad = $Producto->INV_Producto_Cantidad + $or->Cantidad;
			$Producto->INV_Producto_PrecioCosto = $Costo;
			$Producto->save();
		}
		$monto += (($isv/100) * $monto);
		//Se llama el método para realizar la contabilidad
		Contabilidad::invGenerarTransaccion($IdMovimiento, $monto);

		//Modificamos el estado de la orden de compra
		comInventario::CambiaEstadoOrden($IdOrdenCompra, 2);

		return Redirect::route('Inventario.MovimientoInventario.index')
			->with('message', 'Orden de Compra Recibida!');
	}

	public function rechazada(){
		$input = Input::all();
		$CodigoOrdenCompra = $input['COM_OrdenCompra_Codigo'];
		$IdMovimiento = $input['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'];
		$IdOrdenCompra = $input['INV_Movimiento_IDOrdenCompra'];
		$orden = comInventario::InformacionProductosOrdenCompra($CodigoOrdenCompra);
		$isv = 0;
		if ($orden) {
			$isv = $orden[0]->isv;
		}

		$diff = 0;
		foreach ($orden as $or) {
			$diff += ($or->Cantidad * $or->Precio);
		}
		$diff += (($isv/100) * $diff);

		//Se llama el método para realizar la contabilidad
		Contabilidad::GenerarTransaccion(10, $diff);

		//Modificamos el estado de la orden de compra
		comInventario::CambiaEstadoOrden($IdOrdenCompra, 1);

		return Redirect::route('Inventario.MovimientoInventario.index')
			->with('message', 'Orden de Compra Rechazada!');
	}

	public function errores(){
		$input = Input::all();
		//return $input;
		/*$orden = DB::select('select pro.INV_Producto_ID as ID, pro.INV_Producto_Nombre as Nombre, 
					det.COM_DetalleOrdenCompra_Cantidad as Cantidad, det.COM_DetalleOrdenCompra_PrecioUnitario as Precio
					from pymeERP.COM_OrdenCompra com inner join pymeERP.COM_DetalleOrdenCompra det on 
					com.COM_OrdenCompra_IdOrdenCompra = det.COM_OrdenCompra_idOrdenCompra
					inner join pymeERP.INV_Producto pro on det.COM_Producto_idProducto = pro.INV_Producto_ID
					where com.COM_OrdenCompra_IdOrdenCompra = ?', array($input['INV_Movimiento_IDOrdenCompra']));
		//*/
		$CodigoOrdenCompra = $input['COM_OrdenCompra_Codigo'];
		$IdMovimiento = $input['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'];
		$IdOrdenCompra = $input['INV_Movimiento_IDOrdenCompra'];
		$orden = comInventario::InformacionProductosOrdenCompra($CodigoOrdenCompra);
		unset($input['COM_OrdenCompra_Codigo']);

		$isv = 0;
		if ($orden) {
			$isv = $orden[0]->isv;
		}

		//Se crea el Movimiento de Inventario para despues agregar el detalle del movimiento
		$t['INV_Movimiento_IDOrdenCompra'] = $input['INV_Movimiento_IDOrdenCompra'];
		$t['INV_Movimiento_Observaciones'] = $input['INV_Movimiento_Observaciones'];
		$t['INV_Movimiento_FechaCreacion'] = $input['INV_Movimiento_FechaCreacion'];
		$t['INV_Movimiento_UsuarioCreacion'] = $input['INV_Movimiento_UsuarioCreacion'];
		$t['INV_Movimiento_FechaModificacion'] = $input['INV_Movimiento_FechaModificacion'];
		$t['INV_Movimiento_UsuarioModificacion'] = $input['INV_Movimiento_UsuarioModificacion'];
		$t['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = $input['INV_MotivoMovimiento_INV_MotivoMovimiento_ID'];
		$this->MovimientoInventario->create($t);

		//Buscamos el moviemiento que acabamos de crear para poder obtener su id
		$temp = MovimientoInventario::where('INV_Movimiento_IDOrdenCompra', $input['INV_Movimiento_IDOrdenCompra'])->orderBy('INV_Movimiento_ID', 'DESC')->get();
		$Movimiento = $temp[0];
		//se procede a llenar los detalles de Movimiento de Inventario
		$cont = 0;
		$monto = 0;
		$diff = 0;
		//return $input;
		foreach ($orden as $or) {
			//Buscamos el Producto a Agregar
			$Producto = Producto::find($or->ID);
			if ($input['Cant'.$or->ID] < 0) {
				return Redirect::route('Inventario.MovimientoInventario.Orden')
					->withErrors('Ingrese Solo Valores Positivos');
			}elseif ($input['Cant'.$or->ID] > $or->Cantidad) {
				return Redirect::route('Inventario.MovimientoInventario.Orden')
					->withErrors('No puede ingresar un valor mayor a la cantidad de la Orden');
			}elseif ($input['Cant'.$or->ID] > 0) {
				//return $Producto;
				$cont++;
				//Calculando Precio Costo con Promedio Ponderado
				$Costo = (($Producto->INV_Producto_Cantidad * $Producto->INV_Producto_PrecioCosto) + ($input['Cant'.$or->ID] * $or->Precio))/($or->Cantidad + $Producto->INV_Producto_Cantidad);
				//Agregamos los detalles a un array
				$detalle['INV_DetalleMovimiento_IDProducto'] = $or->ID;
				$detalle['INV_DetalleMovimiento_CodigoProducto'] = $Producto->INV_Producto_Codigo;
				$detalle['INV_DetalleMovimiento_NombreProducto'] = $Producto->INV_Producto_Nombre;
				$detalle['INV_DetalleMovimiento_CantidadProducto'] = $input['Cant'.$or->ID];
				$detalle['INV_DetalleMovimiento_PrecioCosto'] = $or->Precio;
				$detalle['INV_DetalleMovimiento_PrecioVenta'] = $Producto->INV_Producto_PrecioVenta;
				$detalle['INV_DetalleMovimiento_FechaCreacion'] = date('Y-m-d H:i:s');
				$detalle['INV_DetalleMovimiento_FechaModificacion'] = date('Y-m-d H:i:s');
				$detalle['INV_DetalleMovimiento_UsuarioCreacion'] = 'Admin';
				$detalle['INV_DetalleMovimiento_UsuarioModificacion'] = 'Admin';
				$detalle['INV_Movimiento_ID'] = $Movimiento->INV_Movimiento_ID;
				$detalle['INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = '2';
				$detalle['INV_Producto_INV_Producto_ID'] = $Producto->INV_Producto_ID;
				$detalle['INV_Producto_INV_Categoria_ID'] = $Producto->INV_Categoria_ID;
				$detalle['INV_Producto_INV_Categoria_IDCategoriaPadre'] = $Producto->INV_Categoria_IDCategoriaPadre;
				$detalle['INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID'] = $Producto->INV_UnidadMedida_ID;
				//return $detalle;

				//Se suma el monto del produto para generar la contabilidad
				$monto += ($input['Cant'.$or->ID] * $or->Precio);
				$diff += (($or->Cantidad - $input['Cant'.$or->ID]) * $or->Precio);

				//Creamos el detalle para un solo producto
				DetalleMovimiento::create($detalle);

				//Actualizamos el Inventario
				$Producto->INV_Producto_Cantidad = $Producto->INV_Producto_Cantidad + $input['Cant'.$or->ID];
				$Producto->INV_Producto_PrecioCosto = $Costo;
				$Producto->save();
			}
		}
		if ($cont > 0) {
			$monto += (($isv/100) * $monto);
			$diff += (($isv/100) * $diff);

			//Se llama el método para realizar la contabilidad
			Contabilidad::invGenerarTransaccion($IdMovimiento, $monto);
			Contabilidad::GenerarTransaccion(10, $diff);

			//Modificamos el estado de la orden de compra
			comInventario::CambiaEstadoOrden($IdOrdenCompra, 0);

			return Redirect::route('Inventario.MovimientoInventario.index')
				->with('message', 'Orden de Compra Recibida con Errores!');
		}
		return Redirect::route('Inventario.MovimientoInventario.Orden')
			->withErrors('Debe seleccionar por lo menos un Producto');
	}

}
