<?php

class EstadoResultadosController extends BaseController {

	/**
	 * EstadoResultado Repository
	 *
	 * @var EstadoResultado
	 */
	protected $EstadoResultado;

	public function __construct(EstadoResultado $EstadoResultado)
	{
		$this->EstadoResultado = $EstadoResultado;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$EstadoResultados = $this->EstadoResultado->all();

		return View::make('EstadoResultados.index', compact('EstadoResultados'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('EstadoResultados.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, EstadoResultado::$rules);

		if ($validation->passes())
		{
			$this->EstadoResultado->create($input);

			
			return Redirect::action('EstadoResultadosController@index');
		}

		return Redirect::route('EstadoResultados.create')
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
		$EstadoResultado = $this->EstadoResultado->findOrFail($id);

		return View::make('EstadoResultados.show', compact('EstadoResultado'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$EstadoResultado = $this->EstadoResultado->find($id);

		if (is_null($EstadoResultado))
		{
			return Redirect::route('EstadoResultados.index');
		}

		return View::make('EstadoResultados.edit', compact('EstadoResultado'));
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
		$validation = Validator::make($input, EstadoResultado::$rules);

		if ($validation->passes())
		{
			$EstadoResultado = $this->EstadoResultado->find($id);
			$EstadoResultado->update($input);

			return Redirect::route('EstadoResultados.show', $id);
		}

		return View::make('EstadoResultados.create')
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
		$this->EstadoResultado->find($id)->delete();

		return Redirect::route('EstadoResultados.index');
	}

}
