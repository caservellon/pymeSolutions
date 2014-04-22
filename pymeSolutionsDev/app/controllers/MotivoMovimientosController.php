<?php

class MotivoMovimientosController extends BaseController {

	/**
	 * MotivoMovimiento Repository
	 *
	 * @var MotivoMovimiento
	 */
	protected $MotivoMovimiento;

	public function __construct(MotivoMovimiento $MotivoMovimiento)
	{
		$this->MotivoMovimiento = $MotivoMovimiento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$MotivoMovimientos = $this->MotivoMovimiento->all();

		return View::make('MotivoMovimientos.index', compact('MotivoMovimientos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('MotivoMovimientos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MotivoMovimiento::$rules);

		if ($validation->passes())
		{
			$this->MotivoMovimiento->create($input);

			return Redirect::route('Inventario.MotivoMovimiento.index');
		}

		return Redirect::route('Inventario.MotivoMovimiento.create')
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
		$MotivoMovimiento = $this->MotivoMovimiento->findOrFail($id);

		return View::make('MotivoMovimientos.show', compact('MotivoMovimiento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$MotivoMovimiento = $this->MotivoMovimiento->find($id);

		if (is_null($MotivoMovimiento))
		{
			return Redirect::route('Inventario.MotivoMovimiento.index');
		}

		return View::make('MotivoMovimientos.edit', compact('MotivoMovimiento'));
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
		$validation = Validator::make($input, MotivoMovimiento::$rules);

		if ($validation->passes())
		{
			$MotivoMovimiento = $this->MotivoMovimiento->find($id);
			$MotivoMovimiento->update($input);

			return Redirect::route('Inventario.MotivoMovimiento.index');
		}

		return Redirect::route('Inventario.MotivoMovimiento.edit', $id)
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
		$this->MotivoMovimiento->find($id)->delete();

		return Redirect::route('Inventario.MotivoMovimiento.index');
	}

}
