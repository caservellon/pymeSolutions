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
		if (Seguridad::listarAtributo()) {
			$Atributos = $this->Atributo->where('INV_Atributo_Activo', 1)->get();
			return View::make('Atributos.index', compact('Atributos'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Seguridad::crearAtributo()) {
			return View::make('Atributos.create');
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		if (Seguridad::crearAtributo()) {
			$input = Input::all();
			$validation = Validator::make($input, Atributo::$rules);
			if ($validation->passes())
			{
				$this->Atributo->create($input);
				return Redirect::route('Inventario.Atributos.index');
			}
			return Redirect::route('Inventario.Atributos.create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
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
		if (Seguridad::listarAtributo()) {
			$Atributo = $this->Atributo->findOrFail($id);
			return View::make('Atributos.show', compact('Atributo'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Seguridad::editarAtributo()) {
			$Atributo = $this->Atributo->find($id);
			if (is_null($Atributo))
			{
				return Redirect::route('Inventario.Atributos.index');
			}
			return View::make('Atributos.edit', compact('Atributo'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Seguridad::editarAtributo()) {
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
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Seguridad::crearAtributo()) {
			$a = Atributo::find($id);
			$a->INV_Atributo_Activo = 0;
			$a->save();
			return Redirect::route('Inventario.Atributos.index');
		} else {
			return Redirect::to('/403');
		}
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
