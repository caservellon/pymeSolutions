<?php

class DevolucionesController extends BaseController {

	/**
	 * Devolucion Repository
	 *
	 * @var Devolucion
	 */
	protected $Devolucion;

	public function __construct(Devolucion $Devolucion)
	{
		$this->Devolucion = $Devolucion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Devoluciones = $this->Devolucion->all();

		return View::make('Devoluciones.index', compact('Devoluciones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Devoluciones.create');
	}

	/**
	 * Chequea si hay deisponibilidad, si existen en inventario restarlo, mostrar que hay que entregar. Sino, generar bono de compra
	 *
	 * @return Response
	 */
	public function process()
	{
		if (Request::ajax())
		{
			$Input = Input::all();
			$cantidadBono = 0;
			$Return = array();
			$totalDevolucion = 0;
			$DevolucionCode = $this->randomCode();

			foreach ($Input['data'] as $prod) {

				$Producto = Producto::where('INV_Producto_Codigo', $prod['codigo'])->get()->first();

				if ($Producto->INV_Producto_Cantidad == 0) {
					$cantidadBono += ($Producto->INV_Producto_PrecioVenta * $prod['cantidad']);
					$totalDevolucion += ($Producto->INV_Producto_PrecioVenta * $prod['cantidad']);
					array_push($Return, [$prod['codigo'] => "Se genero bono de compra."]);
				} else {
					$Producto->INV_Producto_Cantidad = $Producto->INV_Producto_Cantidad - $prod['cantidad'];
					array_push($Return, [$prod['codigo'] => "Hay existencia de Inventario."]);
					$totalDevolucion += ($Producto->INV_Producto_PrecioVenta * $prod['cantidad']);
				}
			}

			$Devolucion = new Devolucion;
			$Devolucion->VEN_Venta_VEN_Venta_id = $Input['no-factura'];
			$Devolucion->VEN_Devolucion_Monto = $totalDevolucion;
			$Devolucion->VEN_Devolucion_Codigo = $DevolucionCode;
			$Devolucion->save();


			foreach ($Input['data'] as $prod) {
				$Detalle = new DetalleDevolucion;
				$Producto = Producto::where('INV_Producto_Codigo', $prod['codigo'])->get()->first();
				$Detalle->VEN_DetalleDevolucion_Producto = $Producto->INV_Producto_Codigo;
				$Detalle->VEN_DetalleDevolucion_Cantidad = $prod['cantidad'];	
				$Detalle->VEN_DetalleDevolucion_Precio = $Producto->INV_Producto_PrecioVenta;
				$Detalle->VEN_Devolucion_VEN_Devolucion_id = $Devolucion->VEN_Devolucion_id;
				$Detalle->save();
			}

			invVentas::Devolucion($Input['data']);


			if ($cantidadBono != 0) {
				$BonoDeCompra = new BonoDeCompra;
				$BonoDeCompra->VEN_BonoDeCompra_Numero = rand(1000000, 9999990);
				$BonoDeCompra->VEN_BonoDeCompra_Valor = $cantidadBono;
				$BonoDeCompra->VEN_BonoDeCompra_TimeStamp = date("Y-m-d H:i:s");
				$BonoDeCompra->VEN_EstadoBono_VEN_EstadoBono_id = 1;
				$BonoDeCompra->VEN_Devolucion_VEN_Devolucion_id = Devolucion::where('VEN_Devolucion_Codigo',$DevolucionCode)->firstOrFail()->VEN_Devolucion_id;
				$BonoDeCompra->save();

				array_push($Return, ['BonoCompraCantidad' => $cantidadBono]);
				array_push($Return, ['BonoCompraCodigo' => $BonoDeCompra->VEN_BonoDeCompra_Numero]);
			}
			

		    return $Return;
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Devolucion::$rules);

		if ($validation->passes())
		{
			$this->Devolucion->create($input);

			return Redirect::route('Ventas.Devoluciones.index');
		}

		return Redirect::route('Ventas.Devoluciones.create')
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
		$Devolucion = $this->Devolucion->findOrFail($id);

		return View::make('Devoluciones.show', compact('Devolucion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Devolucion = $this->Devolucion->find($id);

		if (is_null($Devolucion))
		{
			return Redirect::route('Ventas.Devoluciones.index');
		}

		return View::make('Devoluciones.edit', compact('Devolucion'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Devolucion::$rules);

		if ($validation->passes())
		{
			$Devolucion = $this->Devolucion->find($id);
			$Devolucion->update($input);

			return Redirect::route('Ventas.Devoluciones.show', $id);
		}

		return Redirect::route('Ventas.Devoluciones.edit', $id)
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
		$this->Devolucion->find($id)->delete();

		return Redirect::route('Ventas.Devoluciones.index');
	}

	public function randomCode() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

}
