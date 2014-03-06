<?php

class UnidadMedidasController extends BaseController {

	/**
	 * UnidadMedida Repository
	 *
	 * @var UnidadMedida
	 */
	protected $UnidadMedida;

	public function __construct(UnidadMedida $UnidadMedida)
	{
		$this->UnidadMedida = $UnidadMedida;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$UnidadMedidas = $this->UnidadMedida->all();

		return View::make('UnidadMedidas.index', compact('UnidadMedidas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('UnidadMedidas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, UnidadMedida::$rules);

		if ($validation->passes())
		{
			$UnidadMedida = new UnidadMedida;
			$UnidadMedida->INV_UnidadMedida_Nombre = Input::get('INV_UnidadMedida_Nombre');
			$UnidadMedida->INV_UnidadMedida_Descripcion = Input::get('INV_UnidadMedida_Descripcion');
			$UnidadMedida->INV_UnidadMedida_Activo = Input::get('INV_UnidadMedida_Activo');
			$UnidadMedida->INV_UnidadMedida_FechaCreacion = date('Y-m-d H:i:s');
			$UnidadMedida->INV_UnidadMedida_UsuarioCreacion = Input::get('INV_UnidadMedida_UsuarioCreacion');
			$UnidadMedida->INV_UnidadMedida_FechaModificacion = date('Y-m-d H:i:s');
			$UnidadMedida->INV_UnidadMedida_UsuarioModificacion = Input::get('INV_UnidadMedida_UsuarioModificacion');
			$UnidadMedida->save();
			return Redirect::route('UnidadMedidas.index');
		}

		return Redirect::route('UnidadMedidas.create')
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
		$UnidadMedida = $this->UnidadMedida->findOrFail($id);

		return View::make('UnidadMedidas.show', compact('UnidadMedida'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$UnidadMedida = $this->UnidadMedida->find($id);

		if (is_null($UnidadMedida))
		{
			return Redirect::route('UnidadMedidas.index');
		}

		return View::make('UnidadMedidas.edit', compact('UnidadMedida'));
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
		$validation = Validator::make($input, UnidadMedida::$rules);

		if ($validation->passes())
		{
			$UnidadMedida = $this->UnidadMedida->find($id);
			$UnidadMedida->INV_UnidadMedida_ID = $id;
			$UnidadMedida->INV_UnidadMedida_Nombre = Input::get('INV_UnidadMedida_Nombre');
			$UnidadMedida->INV_UnidadMedida_Descripcion = Input::get('INV_UnidadMedida_Descripcion');
			$UnidadMedida->INV_UnidadMedida_Activo = Input::get('INV_UnidadMedida_Activo');
			$UnidadMedida->INV_UnidadMedida_FechaModificacion = date('Y-m-d H:i:s');
			$UnidadMedida->INV_UnidadMedida_UsuarioModificacion = Input::get('INV_UnidadMedida_UsuarioModificacion');
			$UnidadMedida->update();

			return Redirect::route('UnidadMedidas.show', $id);
		}

		return Redirect::route('UnidadMedidas.edit', $id)
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
		$this->UnidadMedida->find($id)->delete();

		return Redirect::route('UnidadMedidas.index');
	}

}
