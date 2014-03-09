<?php

class CiudadController extends BaseController {

	/**
	 * Ciudad Repository
	 *
	 * @var Ciudad
	 */
	protected $Ciudad;

	public function __construct(Ciudad $Ciudad)
	{
		$this->Ciudad = $Ciudad;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Ciudad = $this->Ciudad->all();

		return View::make('Ciudad.index', compact('Ciudad'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Ciudad.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Ciudad::$rules);

		if ($validation->passes())
		{
			$Ciudad = new Ciudad;
			$Ciudad->INV_Ciudad_Codigo = Input::get('INV_Ciudad_Codigo');
			$Ciudad->INV_Ciudad_Nombre = Input::get('INV_Ciudad_Nombre');
			$Ciudad->INV_Ciudad_Activo = Input::get('INV_Ciudad_Activo');
			$Ciudad->INV_Ciudad_FechaCreacion = date('Y-m-d H:i:s');
			$Ciudad->INV_Ciudad_UsuarioCreacion = Input::get('INV_Ciudad_UsuarioCreacion');
			$Ciudad->INV_Ciudad_FechaModificacion = date('Y-m-d H:i:s');
			$Ciudad->INV_Ciudad_UsuarioModificacion = Input::get('INV_Ciudad_UsuarioModificacion');
			$Ciudad->save();
			return Redirect::route('Inventario.Ciudad.index');
		}

		return Redirect::route('Inventario.Ciudad.create')
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
		$Ciudad = $this->Ciudad->findOrFail($id);

		return View::make('Ciudad.show', compact('Ciudad'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Ciudad = $this->Ciudad->find($id);

		if (is_null($Ciudad))
		{
			return Redirect::route('Inventario.Ciudad.index');
		}

		return View::make('Ciudad.edit', compact('Ciudad'));
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
		$validation = Validator::make($input, Ciudad::$rules);

		if ($validation->passes())
		{
			$Ciudad = $this->Ciudad->find($id);
			$Ciudad->INV_Ciudad_ID = $id;
			$Ciudad->INV_Ciudad_Codigo = Input::get('INV_Ciudad_Codigo');
			$Ciudad->INV_Ciudad_Nombre = Input::get('INV_Ciudad_Nombre');
			$Ciudad->INV_Ciudad_Activo = Input::get('INV_Ciudad_Activo');
			$Ciudad->INV_Ciudad_FechaModificacion = date('Y-m-d H:i:s');
			$Ciudad->INV_Ciudad_UsuarioModificacion = Input::get('INV_Ciudad_UsuarioModificacion');
			$Ciudad->update();

			return Redirect::route('Inventario.Ciudad.show', $id);
		}

		return Redirect::route('Inventario.Ciudad.edit', $id)
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
		$this->Ciudad->find($id)->delete();

		return Redirect::route('Inventario.Ciudad.index');
	}

}
