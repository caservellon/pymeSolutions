<?php

class LibroDiarioController extends BaseController {

	/**
	 * LibroDiario Repository
	 *
	 * @var LibroDiario
	 */
	protected $LibroDiario;

	public function __construct(LibroDiario $LibroDiario)
	{
		$this->LibroDiario = $LibroDiario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$LibroDiario = $this->LibroDiario->all();
		if(Request::Ajax()){
			return View::make('LibroDiario.table')
				->with('LibroDiario',$LibroDiario);
		}else{
			
			$PeriodoContable = PeriodoContable::first();
			return View::make('LibroDiario.index')
				->with('PeriodoContable',$PeriodoContable)
				->with('LibroDiario',$LibroDiario);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('LibroDiarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, LibroDiario::$rules);

		if ($validation->passes())
		{
			$this->LibroDiario->create($input);

			return Redirect::route('LibroDiarios.index');
		}

		return Redirect::route('LibroDiarios.create')
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
		$LibroDiario = $this->LibroDiario->findOrFail($id);

		return View::make('LibroDiarios.show', compact('LibroDiario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$LibroDiario = $this->LibroDiario->find($id);

		if (is_null($LibroDiario))
		{
			return Redirect::route('LibroDiarios.index');
		}

		return View::make('LibroDiarios.edit', compact('LibroDiario'));
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
		$validation = Validator::make($input, LibroDiario::$rules);

		if ($validation->passes())
		{
			$LibroDiario = $this->LibroDiario->find($id);
			$LibroDiario->update($input);

			return Redirect::route('LibroDiarios.show', $id);
		}

		return Redirect::route('LibroDiarios.edit', $id)
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
		$this->LibroDiario->find($id)->delete();

		return Redirect::route('LibroDiarios.index');
	}

}
