<?php

class DetalleDevolucionesController extends BaseController {

	/**
	 * DetalleDevolucion Repository
	 *
	 * @var DetalleDevolucion
	 */
	protected $DetalleDevolucion;

	public function __construct(DetalleDevolucion $DetalleDevolucion)
	{
		$this->DetalleDevolucion = $DetalleDevolucion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$DetalleDevoluciones = $this->DetalleDevolucion->all();

		return View::make('DetalleDevoluciones.index', compact('DetalleDevoluciones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('DetalleDevoluciones.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, DetalleDevolucion::$rules);

		if ($validation->passes())
		{
			$this->DetalleDevolucion->create($input);

			return Redirect::route('DetalleDevoluciones.index');
		}

		return Redirect::route('DetalleDevoluciones.create')
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
		$DetalleDevolucion = $this->DetalleDevolucion->findOrFail($id);

		return View::make('DetalleDevoluciones.show', compact('DetalleDevolucion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DetalleDevolucion = $this->DetalleDevolucion->find($id);

		if (is_null($DetalleDevolucion))
		{
			return Redirect::route('DetalleDevoluciones.index');
		}

		return View::make('DetalleDevoluciones.edit', compact('DetalleDevolucion'));
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
		$validation = Validator::make($input, DetalleDevolucion::$rules);

		if ($validation->passes())
		{
			$DetalleDevolucion = $this->DetalleDevolucion->find($id);
			$DetalleDevolucion->update($input);

			return Redirect::route('DetalleDevoluciones.show', $id);
		}

		return Redirect::route('DetalleDevoluciones.edit', $id)
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
		$this->DetalleDevolucion->find($id)->delete();

		return Redirect::route('DetalleDevoluciones.index');
	}

}
