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
		//$DetalleMovimientos = $this->DetalleMovimiento->all();
		$DetalleMovimientos = $this->DetalleMovimiento->paginate(5);
		return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));

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
		$Categorias = Categoria::all();
		//$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array(0));
		$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//return $idProductos;
		$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array($id));
		//$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(0));
		return View::make('DetalleMovimientos.create', compact('Productos', 'Motivo', 'id', 'results', 'Categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$t = array();
		//return $input;
		for (reset($input); $i = key($input); next($input)) {
			if ($i != '_token' && $i != 'Motivo' && $i != 'Motivo2') {
				$t1 = $i;
				next($input);
				$t2 = key($input);
				next($input);
				$t3 = key($input);
				next($input);
				$t4 = key($input);
				$t6 = $input[$t2];
				if ($t1 == 'A'.$t6) {
					next($input);
					$t5 = key($input);
					$t[$t2] = $input[$t2];
					$t[$t3] = $input[$t3];
					$t[$t4] = $input[$t4];
					if ($input[$t4] == '1')
						$t[$t4] = $input[$t5];
					elseif ($input[$t4] == '')
						$t[$t4] = 0;
				}
			}
		}
		//return $t;
		if (sizeof($t) == 0) {
			return Redirect::route('Inventario.DetalleMovimiento.create')
			->withInput()
			->withErrors('Debe seleccionar por lo menos un Producto!')
			->with('message', 'There were validation errors.');
		}
		//return $t;
		$validation = true;
		for (reset($t); $j = key($t); next($t)) {
			next($t);
			$j = key($t);
			if ($t[$j] < 1) {
				$validation = false;
				break;
			}
			next($t);
		}
		
		if ($validation)
		{
			//return $t;
			$monto = 0;
			for (reset($t); $x = key($t); next($t)) {
				$detalle = array();
				$t1 = $x;
				next($t);
				$t2 = key($t);
				next($t);
				$t3 = key($t);
				$Producto = Producto::find($input[$t1]);

				//Calcular Precio de Costo
				$Costo = (($Producto->INV_Producto_Cantidad * $Producto->INV_Producto_PrecioCosto) + ($t[$t3] * $t[$t2]))/($t[$t2] + $Producto->INV_Producto_Cantidad);
				
				$Producto->INV_Producto_PrecioCosto = $Costo;
				$Producto->INV_Producto_Cantidad = $Producto->INV_Producto_Cantidad + $t[$t2];
				$Producto->save();

				//llenado array detalle para almacenarlo
				$detalle['INV_DetalleMovimiento_IDProducto'] = $Producto->INV_Producto_ID;
				$detalle['INV_DetalleMovimiento_CodigoProducto'] = $Producto->INV_Producto_Codigo;
				$detalle['INV_DetalleMovimiento_NombreProducto'] = $Producto->INV_Producto_Nombre;
				$detalle['INV_DetalleMovimiento_CantidadProducto'] = $t[$t2];
				$detalle['INV_DetalleMovimiento_PrecioCosto'] = $t[$t3];
				$detalle['INV_DetalleMovimiento_PrecioVenta'] = $Producto->INV_Producto_PrecioVenta;
				$detalle['INV_DetalleMovimiento_FechaCreacion'] = date('Y-m-d H:i:s');
				$detalle['INV_DetalleMovimiento_UsuarioCreacion'] = Auth::user()->SEG_Usuarios_Username;
				$detalle['INV_DetalleMovimiento_FechaModificacion'] = date('Y-m-d H:i:s');
				$detalle['INV_DetalleMovimiento_UsuarioModificacion'] = Auth::user()->SEG_Usuarios_Username;
				$detalle['INV_Movimiento_ID'] = $input['Motivo'];
				$detalle['INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID'] = $input['Motivo2'];
				$detalle['INV_Producto_INV_Producto_ID'] = $Producto->INV_Producto_ID;
				$detalle['INV_Producto_INV_Categoria_ID'] = $Producto->INV_Categoria_ID;
				$detalle['INV_Producto_INV_Categoria_IDCategoriaPadre'] = $Producto->INV_Categoria_IDCategoriaPadre;
				$detalle['INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID'] = $Producto->INV_UnidadMedida_ID;

				$this->DetalleMovimiento->create($detalle);
				$monto += ($t[$t2] * $t[$t3]);
			}
			
			//Generar los asientos para la transacción de entrada a inventario
			Contabilidad::invGenerarTransaccion($input['Motivo2'], $monto);
			//return View::make('DetalleMovimientos.create', compact('Productos', 'Motivo', 'id'));
			return Redirect::route('Inventario.MovimientoInventario.Detalles', array($input['Motivo']));
		}

		return Redirect::route('Inventario.DetalleMovimiento.create')
			->withInput()
			->withErrors('Ingrese solamente cantidades mayores que 0!')
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
		//$idMotivo = MovimientoInventario::all()->count();
		$temp = DB::select('select INV_Movimiento_ID from INV_Movimiento order by INV_Movimiento_ID desc limit 1');
		$idMotivo = 0;
		foreach ($temp as $key) {
			$idMotivo = $key->INV_Movimiento_ID;
		}
		$Motivo = MovimientoInventario::find($idMotivo);
		//$Motivo = MovimientoInventario::find(0);

		$Producto = Producto::find($id);
		
		return View::make('DetalleMovimientos.agregar', compact('Producto', 'Motivo'));
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
		//$idProductos = DB::select('select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?', array($id));
		//return $idProductos;
		$Categorias = Categoria::all();
		$text = Input::get('search');
		if(Input::get('search')=='')
			$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array($id));
		else 
			$Productos = DB::select("select * from INV_Producto where (INV_Producto_Nombre LIKE '%". $text ."%' or INV_Producto_Codigo LIKE '%". $text ."%' or INV_Categoria_ID in (select INV_Categoria_ID from INV_Categoria where INV_Categoria_Nombre LIKE '%". $text ."%') or INV_Categoria_IDCategoriaPadre in (select INV_Categoria_ID from INV_Categoria where INV_Categoria_Nombre LIKE '%". $text ."%')) and INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)", array($id));
		//$Productos = DB::select('select * from INV_Producto where INV_Producto_ID not in (select INV_DetalleMovimiento_IDProducto from INV_DetalleMovimiento where INV_Movimiento_ID = ?)', array(0));
		//$Productos = Producto::where('INV_Producto_ID', '=', Input::get('search'))->orWhere('INV_Producto_Codigo', '=', Input::get('search'))->orWhere('INV_Producto_Nombre', '=', Input::get('search'))->get();
		//return DB::select('select * from INV_Producto where INV_Producto_Nombre = ? and INV_Producto_ID = ?',array(Input::get('search'), Input::get('search')));
		return View::make('DetalleMovimientos.create', compact('Productos', 'Motivo', 'id', 'results', 'Categorias'));
	}

		public function search_index(){

			if(Input::get('FechaFin') == '') {
				$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', Input::get('INV_DetalleMovimiento_IDProducto'))->where('INV_DetalleMovimiento_FechaModificacion', '>=' , Input::get('FechaInc'))->where('INV_DetalleMovimiento_FechaModificacion', '<=', date('Y-m-d H:i:s'))->paginate(5);
				return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));
			} elseif(Input::get('FechaInc') == '') {
				$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', Input::get('INV_DetalleMovimiento_IDProducto'))->where('INV_DetalleMovimiento_FechaModificacion', '>=' , date('Y-m-d H:i:s'))->where('INV_DetalleMovimiento_FechaModificacion', '<=', Input::get('FechaFin'))->paginate(5);
				return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));
			} elseif (Input::get('FechaInc') == '' && Input::get('FechaInc') == '') {
				$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', Input::get('INV_DetalleMovimiento_IDProducto'))->where('INV_DetalleMovimiento_FechaModificacion', '>=' , date('Y-m-d H:i:s'))->where('INV_DetalleMovimiento_FechaModificacion', '<=', date('Y-m-d H:i:s'))->paginate(5);
				return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));
			} else {
				$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', Input::get('INV_DetalleMovimiento_IDProducto'))->where('INV_DetalleMovimiento_FechaModificacion', '>=' , Input::get('FechaInc'))->where('INV_DetalleMovimiento_FechaModificacion', '<=', Input::get('FechaFin'))->paginate(5);
 				return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));
			}

			//$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', Input::get('INV_DetalleMovimiento_IDProducto'))->where('INV_DetalleMovimiento_FechaModificacion', '>=' , Input::get('FechaInc'))->where('INV_DetalleMovimiento_FechaModificacion', '<=', Input::get('FechaFin'))->get();
			//return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));

	}

	public function history($id){
		$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', $id)->paginate(5);
		if (!$DetalleMovimientos->isEmpty()) {
			//$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', $id);
			//return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));


		$DetalleMovimientos = DetalleMovimiento::where('INV_DetalleMovimiento_IDProducto', $id)->paginate(5); 
		return View::make('DetalleMovimientos.index', compact('DetalleMovimientos'));

		} else {
			
		}
	}
		
}
