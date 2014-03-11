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
		$Horarios = $this->Horario->all();

		return View::make('Horarios.index', compact('Horarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Horarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Horario = $this->Horario->findOrFail($id);

		return View::make('Horarios.show', compact('Horario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Horario = $this->Horario->find($id);

		if (is_null($Horario))
		{
			return Redirect::route('Inventario.Horarios.index');
		}

		return View::make('Horarios.edit', compact('Horario'));
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
		$validation = Validator::make($input, Horario::$rules);

		if ($validation->passes())
		{
			$Horario = $this->Horario->find($id);
			$Horario->update($input);

			return Redirect::route('Inventario.Horarios.show', $id);
		}

		return Redirect::route('Inventario.Horarios.edit', $id)
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
		$this->Horario->find($id)->delete();

		return Redirect::route('Inventario.Horarios.index');
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
