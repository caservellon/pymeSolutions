<?php

class FormaPagoVentaController extends BaseController {

	/**
	 * FormaPagoVentas Repository
	 *
	 * @var FormaPagoVentas
	 */
	protected $FormaPagoVentas;

	public function __construct(FormaPagoVentas $FormaPagoVentas)
	{
		$this->FormaPagoVentas = $FormaPagoVentas;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$FormaPagoVenta = $this->FormaPagoVentas->all();

		return View::make('FormaPagoVenta.index', compact('FormaPagoVenta'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('FormaPagoVenta.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, FormaPagoVentas::$rules);

		if ($validation->passes())
		{
			$this->FormaPagoVentas->create($input);

			return Redirect::route('Ventas.FormaPagoVenta.index');
		}

		return Redirect::route('Ventas.FormaPagoVenta.create')
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
		$FormaPagoVentas = $this->FormaPagoVentas->findOrFail($id);

		return View::make('FormaPagoVenta.show', compact('FormaPagoVentas'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$FormaPagoVentas = $this->FormaPagoVentas->find($id);

		if (is_null($FormaPagoVentas))
		{
			return Redirect::route('Ventas.FormaPagoVenta.index');
		}

		return View::make('FormaPagoVenta.edit', compact('FormaPagoVentas'));
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
		$validation = Validator::make($input, FormaPagoVentas::$rules);

		if ($validation->passes())
		{
			$FormaPagoVentas = $this->FormaPagoVentas->find($id);
			$FormaPagoVentas->update($input);

			return Redirect::route('Ventas.FormaPagoVenta.show', $id);
		}

		return Redirect::route('Ventas.FormaPagoVenta.edit', $id)
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
		$this->FormaPagoVentas->find($id)->delete();

		return Redirect::route('Ventas.FormaPagoVenta.index');
	}

}
