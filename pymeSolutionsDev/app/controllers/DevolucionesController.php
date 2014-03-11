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
		$Devolucions = $this->Devolucion->all();

		return View::make('Devoluciones.index', compact('Devolucions'));
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

}
