<?php

class PagosController extends BaseController {

	/**
	 * Pago Repository
	 *
	 * @var Pago
	 */
	protected $Pago;

	public function __construct(Pago $Pago)
	{
		$this->Pago = $Pago;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Pagos = $this->Pago->all();

		return View::make('Pagos.index', compact('Pagos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Pagos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Pago::$rules);

		if ($validation->passes())
		{
			$this->Pago->create($input);

			return Redirect::route('Pagos.index');
		}

		return Redirect::route('Pagos.create')
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
		$Pago = $this->Pago->findOrFail($id);

		return View::make('Pagos.show', compact('Pago'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Pago = $this->Pago->find($id);

		if (is_null($Pago))
		{
			return Redirect::route('Pagos.index');
		}

		return View::make('Pagos.edit', compact('Pago'));
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
		$validation = Validator::make($input, Pago::$rules);

		if ($validation->passes())
		{
			$Pago = $this->Pago->find($id);
			$Pago->update($input);

			return Redirect::route('Pagos.show', $id);
		}

		return Redirect::route('Pagos.edit', $id)
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
		$this->Pago->find($id)->delete();

		return Redirect::route('Pagos.index');
	}

}
