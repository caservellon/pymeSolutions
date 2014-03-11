<?php

class DescuentosController extends BaseController {

	/**
	 * Descuento Repository
	 *
	 * @var Descuento
	 */
	protected $Descuento;

	public function __construct(Descuento $Descuento)
	{
		$this->Descuento = $Descuento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Descuentos = $this->Descuento->all();

		return View::make('Descuentos.index', compact('Descuentos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Descuentos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Descuento::$rules);

		if ($validation->passes())
		{
			$this->Descuento->create($input);

			return Redirect::route('Ventas.Descuentos.index');
		}

		return Redirect::route('Ventas.Descuentos.create')
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
		$Descuento = $this->Descuento->findOrFail($id);

		return View::make('Descuentos.show', compact('Descuento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Descuento = $this->Descuento->find($id);

		if (is_null($Descuento))
		{
			return Redirect::route('Ventas.Descuentos.index');
		}

		return View::make('Descuentos.edit', compact('Descuento'));
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
		$validation = Validator::make($input, Descuento::$rules);

		if ($validation->passes())
		{
			$Descuento = $this->Descuento->find($id);
			$Descuento->update($input);

			return Redirect::route('Ventas.Descuentos.index');
		}

		return Redirect::route('Ventas.Descuentos.edit', $id)
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
		$this->Descuento->find($id)->delete();

		return Redirect::route('Ventas.Descuentos.index');
	}

}
