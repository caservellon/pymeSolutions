<?php

class DetalleDeVentaController extends BaseController {

	/**
	 * DetalleDeVenta Repository
	 *
	 * @var DetalleDeVenta
	 */
	protected $DetalleDeVenta;

	public function __construct(DetalleDeVenta $DetalleDeVenta)
	{
		$this->DetalleDeVenta = $DetalleDeVenta;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$DetalleDeVenta = $this->DetalleDeVenta->all();

		return View::make('DetalleDeVenta.index', compact('DetalleDeVenta'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('DetalleDeVenta.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, DetalleDeVenta::$rules);

		if ($validation->passes())
		{
			$this->DetalleDeVenta->create($input);

			return Redirect::route('Ventas.DetalleDeVenta.index');
		}

		return Redirect::route('Ventas.DetalleDeVenta.create')
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
		$DetalleDeVenta = $this->DetalleDeVenta->findOrFail($id);

		return View::make('DetalleDeVenta.show', compact('DetalleDeVenta'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DetalleDeVenta = $this->DetalleDeVenta->find($id);

		if (is_null($DetalleDeVenta))
		{
			return Redirect::route('Ventas.DetalleDeVenta.index');
		}

		return View::make('DetalleDeVenta.edit', compact('DetalleDeVenta'));
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
		$validation = Validator::make($input, DetalleDeVenta::$rules);

		if ($validation->passes())
		{
			$DetalleDeVenta = $this->DetalleDeVenta->find($id);
			$DetalleDeVenta->update($input);

			return Redirect::route('Ventas.DetalleDeVenta.show', $id);
		}

		return Redirect::route('Ventas.DetalleDeVenta.edit', $id)
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
		$this->DetalleDeVenta->find($id)->delete();

		return Redirect::route('Ventas.DetalleDeVenta.index');
	}

}
