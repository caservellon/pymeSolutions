<?php

class HorariosController extends BaseController {

	/**
	 * Horario Repository
	 *
	 * @var Horario
	 */
	protected $Horario;

	public function __construct(Horario $Horario)
	{
		$this->Horario = $Horario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::listarHorario()) {
			//$Horarios = $this->Horario->all();
			$Horarios = $this->Horario->where('INV_Horario_Activo', 1)->get();
			return View::make('Horarios.index', compact('Horarios'));
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
		if (Seguridad::crearHorario()) {
			return View::make('Horarios.create');
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
		if (Seguridad::crearHorario()) {
			$input = Input::all();
			$validation = Validator::make($input, Horario::$rules);
			if ($validation->passes())
			{
				$this->Horario->create($input);
				return Redirect::route('Inventario.Horarios.index');
			}
			return Redirect::route('Inventario.Horarios.create')
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
		if (Seguridad::listarHorario()) {
			$Horario = $this->Horario->findOrFail($id);
			return View::make('Horarios.show', compact('Horario'));
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
		if (Seguridad::editarHorario()) {
			$Horario = $this->Horario->find($id);
			if (is_null($Horario))
			{
				return Redirect::route('Inventario.Horarios.index');
			}
			return View::make('Horarios.edit', compact('Horario'));
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

		if (Seguridad::editarHorario()) {
			$input = Input::except('_method');
			$validation = Validator::make($input, Horario::$rules);
			if ($validation->passes())
			{
				$Horario = $this->Horario->find($id);
				$Horario->update($input);
				return Redirect::route('Inventario.Horarios.index', $id);
			}
			return Redirect::route('Inventario.Horarios.edit', $id)
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
		if (Seguridad::listarHorario()) {
			//$this->Horario->find($id)->delete();
			$h = Horario::find($id);
			$h->INV_Horario_Activo = 0;
			$h->save();
			return Redirect::route('Inventario.Horarios.index');
		} else {
			return Redirect::to('/403');
		}
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
