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
		$Ventas = $this->Venta->all();

		return View::make('Ventas.index', compact('Ventas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Clientes = Persona::all();

		$Descuentos = Descuento::all();
		$Productos = Producto::all();
		return View::make('Ventas.create', compact('Productos', 'Descuentos', 'Clientes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
	}

	/**
	 * Store a newly created resource in storage. Via AJAX
	 *
	 * @return Response
	 */
	public function guardar(){

		if (Request::ajax())
		{
			$productos = Input::get('productos');
			$descuentos = Input::get('descuentos');
			$pagos = Input::get('');
		}
		

		return Redirect::route('Ventas.Ventas.index');
	}

	public function Listar() {
		$Ventas = DB::table('VEN_Venta')->get();

		if ($Ventas) {
			return View::make('Ventas.lista')->with('Ventas', $Ventas);
		}

		return Redirect::route('Ventas.create');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function searchInvoice()
	{
		if (Request::ajax())
		{
			$Input = Input::all();

			$Venta = Venta::find($Input['searchTerm']);
			$DetalleVenta = DetalleDeVenta::where('VEN_Venta_VEN_Venta_id', $Venta->VEN_Venta_id)->get();

		    return $DetalleVenta;
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
		if (Request::ajax())
		{
			$Input = Input::all();

			$Venta = Venta::find($Input['searchTerm']);

		    return $Venta;
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
		if (Request::ajax())
		{
			$Input = Input::all();

			$Producto = Producto::where('INV_Producto_Codigo', $Input['codigo'])->get();

		    return $Producto;
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
		$Venta = $this->Venta->findOrFail($id);

		return View::make('Ventas.show', compact('Venta'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Venta = $this->Venta->find($id);

		if (is_null($Venta))
		{
			return Redirect::route('Ventas.Ventas.index');
		}

		return View::make('Ventas.edit', compact('Venta'));
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
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->Venta->find($id)->delete();

		return Redirect::route('Ventas.Ventas.index');
	}

}
