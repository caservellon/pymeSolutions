<?php

class PeriodoCierreDeCajasController extends BaseController {

	/**
	 * PeriodoCierreDeCaja Repository
	 *
	 * @var PeriodoCierreDeCaja
	 */
	protected $PeriodoCierreDeCaja;

	public function __construct(PeriodoCierreDeCaja $PeriodoCierreDeCaja)
	{
		$this->PeriodoCierreDeCaja = $PeriodoCierreDeCaja;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$PeriodoCierreDeCajas = $this->PeriodoCierreDeCaja->all();

		return View::make('PeriodoCierreDeCajas.index', compact('PeriodoCierreDeCajas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('PeriodoCierreDeCajas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, PeriodoCierreDeCaja::$rules);

		if ($validation->passes())
		{
			$this->PeriodoCierreDeCaja->create($input);

			return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
		}

		return Redirect::route('Ventas.PeriodoCierreDeCajas.create')
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
		$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->findOrFail($id);

		return View::make('PeriodoCierreDeCajas.show', compact('PeriodoCierreDeCaja'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->find($id);

		if (is_null($PeriodoCierreDeCaja))
		{
			return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
		}

		return View::make('PeriodoCierreDeCajas.edit', compact('PeriodoCierreDeCaja'));
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
		$validation = Validator::make($input, PeriodoCierreDeCaja::$rules);

		if ($validation->passes())
		{
			$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->find($id);
			$PeriodoCierreDeCaja->update($input);

			return Redirect::route('Ventas.PeriodoCierreDeCajas.show', $id);
		}

		return Redirect::route('Ventas.PeriodoCierreDeCajas.edit', $id)
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
		$this->PeriodoCierreDeCaja->find($id)->delete();

		return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
	}

}
