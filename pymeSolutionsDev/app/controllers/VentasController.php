<?php

class VentasController extends BaseController {

	/**
	 * Venta Repository
	 *
	 * @var Venta
	 */
	protected $Venta;

	public function __construct(Venta $Venta)
	{
		$this->Venta = $Venta;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::VerVentas()) {
			$Ventas = $this->Venta->all();

			return View::make('Ventas.index', compact('Ventas'));
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
		if (Seguridad::GestionarVentas()) {
			$Clientes = Persona::all();

			$Descuentos = Descuento::where('VEN_DescuentoEspecial_Estado', '1')->get();
			$Productos = Producto::all();

			if (Caja::where("VEN_Caja_Estado", 0)->get()->count() == 0) {
				return Redirect::route('Ventas.Cajas.index');
			}

			return View::make('Ventas.create', compact('Productos', 'Descuentos', 'Clientes'));
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
		if (Seguridad::GestionarVentass()) {
			$input = Input::all();
			$validation = Validator::make($input, Venta::$rules);

			if ($validation->passes())
			{
				$this->Venta->create($input);

				return Redirect::route('Ventas.Ventas.index');
			}

			return Redirect::route('Ventas.Ventas.create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage. Via AJAX
	 *
	 * @return Response
	 */
	public function guardar(){
		if (Seguridad::GuardarVentas()) {
			//$numFact = 0;
			$return = array();
			if (Request::ajax())
			{
				$productos = Input::get('productos');
				$descuentos = Input::get('descuentos');
				$abonos = Input::get('abonos');
				$saldo = Input::get('saldo');
				$isv = Input::get('isv');
				$caja = Input::get('caja');
				$total = Input::get('total');
				$idcliente = Input::get('clienteid');
				$tipo_cliente = Input::get('tipocliente');

				$subTotal = 0.0;
				$isvCalculado = 0;
				$descuentoCalculado = 0;
				$otrosIsvCalculado = 0;
				$costoVendido = 0;
				$totalEfectivo = 0;
				$totalBonoDeCompra = 0;

				$venta = new Venta;
				$venta->VEN_Venta_Codigo = "Venta_Normal_" . (double) $caja . "_" . date("Y-m-d H:i:s"); 
				$venta->VEN_Caja_VEN_Caja_id = (double) $caja;
				$venta->VEN_Venta_TotalCambio = (double) $saldo;
				if($tipo_cliente == 0){

					$venta->CRM_Personas_CRM_Personas_ID = $idcliente;
				} else {
					$venta->CRM_Empresas_CRM_Empresas_ID = $idcliente;
				}
				$venta->VEN_Venta_TimeStamp = date("Y-m-d h:i:s");
				$venta->VEN_Venta_ISV = $isv;
				$venta->VEN_Venta_Total = $total;
				$venta->VEN_Venta_Subtotal = $total - $isv;

				$venta->save();
				array_push($return, ['numFact' => $venta->VEN_Venta_id]);

				

				foreach ($productos as $p) {
					$DetalleVenta = new DetalleDeVenta;
					$DetalleVenta->VEN_DetalleDeVenta_CantidadVendida = $p['cantidad'];
					$DetalleVenta->VEN_DetalleDeVenta_Codigo = $p['codigo'];
					$DetalleVenta->VEN_DetalleDeVenta_PrecioVenta = Producto::where('INV_Producto_Codigo', $p['codigo'])->firstOrFail()->INV_Producto_PrecioVenta;
					$DetalleVenta->VEN_Venta_VEN_Venta_id = $venta->VEN_Venta_id;
					$DetalleVenta->save();
					$subTotal += (float)$DetalleVenta->VEN_DetalleDeVenta_PrecioVenta * $p['cantidad'];
					//$isvCalculado += $p['cantidad'] * $DetalleVenta->VEN_DetalleDeVenta_PrecioVenta * 0.15;
					//$isvCalculado += $subTotal * Producto::where('INV_Producto_Codigo', $p['codigo'])->firstOrFail()->INV_Producto_Impuesto1 + ($subTotal * Producto::where('INV_Producto_Codigo', $p['codigo'])->firstOrFail()->INV_Producto_Impuesto2); // TODO revisar el campo de isv en db
					$costoVendido += $p['cantidad'] * Producto::where('INV_Producto_Codigo', $p['codigo'])->firstOrFail()->INV_Producto_PrecioCosto;
				}



				if ($descuentos != "") {
					foreach ($descuentos as $d) {
						$descuentoCalculado += ((Double) Descuento::find(intval($d))->VEN_DescuentoEspecial_Valor / 100.0) * $subTotal;
					}
				}
				

				$venta->VEN_Venta_DescuentoCliente = $descuentoCalculado;
				$venta->VEN_Venta_TotalDescuentoProductos = $descuentoCalculado;
				$venta->save();


				foreach ($abonos as $a) {
					$pago = new Pago;
					$pago->VEN_Pago_Cantidad = (float) $a['monto'];
					$pago->VEN_Venta_VEN_Venta_id = $venta->VEN_Venta_id;
					$pago->VEN_Venta_VEN_Caja_VEN_Caja_id = $caja;
					$pago->VEN_FormaPago_VEN_FormaPago_id = FormaPagoVentas::where('VEN_FormaPago_Descripcion',$a['metodo'])->firstOrFail()->VEN_FormaPago_id;
					$pago->save();
					if ($a['metodo'] == "Efectivo") {
						$totalEfectivo += $a['monto'];
					} else {
						$totalBonoDeCompra += $a['monto'];
					}
				}

				invVentas::Venta($productos);

				$subTotal = $subTotal - $descuentoCalculado;
				if ($totalBonoDeCompra != 0) {
					Contabilidad::GenerarTransaccion(4, $subTotal);
				}
				if ($totalEfectivo != 0) {
					Contabilidad::GenerarTransaccion(3, $subTotal);
				}
				
				
				Contabilidad::GenerarTransaccion(5,$subTotal * 0.15);
				Contabilidad::GenerarTransaccion(7,$descuentoCalculado);
				Contabilidad::GenerarTransaccion(6,$costoVendido);

				return $return;


			}
		} else {
			return Redirect::to('/403');
		}

	}

	public function Listar() {
		if (Seguridad::ListarVentas()) {
			$Ventas = DB::table('VEN_Venta')->paginate(10);

			if ($Ventas) {
				return View::make('Ventas.lista')->with('Ventas', $Ventas);
			}

			return Redirect::route('Ventas.Ventas.create');
		} else {
			return Redirect::to('/403');
		}

	}

	public function ListarOne($id) {
		if (Seguridad::ListarVentas()) {
			$Venta = DB::table('VEN_DetalleDeVenta')->where('VEN_Venta_VEN_Venta_id',$id)->get();

			if ($Venta) {
				return View::make('Ventas.ListarOne')->with('Venta', $Venta, 'id', $id);
			}

			return Redirect::route('Ventas.Ventas.create');
		} else {
			return Redirect::to('/403');
		}

	}

	public function Devs() {
		if (Seguridad::ListarVentas()) {
			$Devs = DB::table('VEN_Devolucion')->paginate(10);

			if ($Devs) {
				return View::make('Ventas.devs')->with('Devs', $Devs);
			}

			return Redirect::route('Ventas.Ventas.create');
		} else {
			return Redirect::to('/403');
		}

	}

	public function DevsOne($id) {
		if (Seguridad::ListarVentas()) {
			$Dev = DB::table('VEN_DetalleDevolucion')->where('VEN_Devolucion_VEN_Devolucion_id',$id)->get();

			if ($Dev) {
				return View::make('Ventas.devsOne')->with('Dev', $Dev);
			}

			return Redirect::route('Ventas.Ventas.create');
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
	public function searchInvoice()
	{
		if (Seguridad::GestionarVentas()) {
			if (Request::ajax())
			{
				$Input = Input::all();

				$Venta = Venta::find($Input['searchTerm']);
				$DetalleVenta = DetalleDeVenta::where('VEN_Venta_VEN_Venta_id', $Venta->VEN_Venta_id)->get();

			    return $DetalleVenta;
			}
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
	public function searchSaleInfo()
	{
		if (Seguridad::ListarVentas()) {
			if (Request::ajax())
			{
				$Input = Input::all();

				$Venta = Venta::find($Input['searchTerm']);

			    return $Venta;
			}
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
	public function checkStock()
	{
		if (Seguridad::GestionarVentass()) {
			if (Request::ajax())
			{
				$Input = Input::get('codigo');

				$Producto = Producto::where('INV_Producto_Codigo', $Input)->firstOrFail();

			    return $Producto->INV_Producto_Cantidad;
			}
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
		if (Seguridad::VerVentas()) {
			$Venta = $this->Venta->findOrFail($id);

			return View::make('Ventas.show', compact('Venta'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Seguridad::GuardarVentas()) {
			$Venta = $this->Venta->find($id);

			if (is_null($Venta))
			{
				return Redirect::route('Ventas.Ventas.index');
			}

			return View::make('Ventas.edit', compact('Venta'));
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
		if (Seguridad::GuardarVentas()) {
			$input = array_except(Input::all(), '_method');
			$validation = Validator::make($input, Venta::$rules);

			if ($validation->passes())
			{
				$Venta = $this->Venta->find($id);
				$Venta->update($input);

				return Redirect::route('Ventas.Ventas.show', $id);
			}

			return Redirect::route('Ventas.Ventas.edit', $id)
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
		if (Seguridad::GuardarVentas()) {
			$this->Venta->find($id)->delete();

			return Redirect::route('Ventas.Ventas.index');
		} else {
			return Redirect::to('/403');
		}
	}

}
