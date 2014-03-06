<?php

class AtributosController extends BaseController {

	/**
	 * Atributo Repository
	 *
	 * @var Atributo
	 */
	protected $Atributo;

	public function __construct(Atributo $Atributo)
	{
		$this->Atributo = $Atributo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Atributos = $this->Atributo->all();

		return View::make('Atributos.index', compact('Atributos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Atributos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Atributo::$rules);

		if ($validation->passes())
		{
			$Atributo = new Atributo;
			$Atributo->INV_Atributo_Nombre = Input::get('INV_Atributo_Nombre');
			$Atributo->INV_Atributo_TipoDato = Input::get('INV_Atributo_TipoDato');
			$Atributo->INV_Atributo_Activo = Input::get('INV_Atributo_Activo');
			$Atributo->INV_Atributo_FechaCreacion = date('Y-m-d H:i:s');
			$Atributo->INV_Atributo_UsuarioCreacion = Input::get('INV_Atributo_UsuarioCreacion');
			$Atributo->INV_Atributo_FechaModificacion = date('Y-m-d H:i:s');
			$Atributo->INV_Atributo_UsuarioModificacion = Input::get('INV_Atributo_UsuarioModificacion');
			$Atributo->save();
			return Redirect::route('Inventario.Atributos.index');
		}

		return Redirect::route('Inventario.Atributos.create')
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
		$Atributo = $this->Atributo->findOrFail($id);

		return View::make('Atributos.show', compact('Atributo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Atributo = $this->Atributo->find($id);

		if (is_null($Atributo))
		{
			return Redirect::route('Inventario.Atributos.index');
		}

		return View::make('Atributos.edit', compact('Atributo'));
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
		$validation = Validator::make($input, Atributo::$rules);

		if ($validation->passes())
		{
			$Atributo = $this->Atributo->find($id);
			$Atributo->INV_Atributo_ID = $id;
			$Atributo->INV_Atributo_Codigo = Input::get('INV_Atributo_Codigo');
			$Atributo->INV_Atributo_Nombre = Input::get('INV_Atributo_Nombre');
			$Atributo->INV_Atributo_TipoDato = Input::get('INV_Atributo_TipoDato');
			$Atributo->INV_Atributo_Activo = Input::get('INV_Atributo_Activo');
			$Atributo->INV_Atributo_FechaModificacion = date('Y-m-d H:i:s');
			$Atributo->INV_Atributo_UsuarioModificacion = Input::get('INV_Atributo_UsuarioModificacion');
			$Atributo->update();

			return Redirect::route('Inventario.Atributos.show', $id);
		}

		return Redirect::route('Inventario.Atributos.edit', $id)
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
		$this->Atributo->find($id)->delete();

		return Redirect::route('Inventario.Atributos.index');
	}

}
