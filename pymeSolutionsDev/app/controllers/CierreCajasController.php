<?php

class CierreCajasController extends BaseController {

	/**
	 * CierreCaja Repository
	 *
	 * @var CierreCaja
	 */
	protected $CierreCaja;

	public function __construct(CierreCaja $CierreCaja)
	{
		$this->CierreCaja = $CierreCaja;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CierreCajas = $this->CierreCaja->all();

		return View::make('CierreCajas.index', compact('CierreCajas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CierreCajas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, CierreCaja::$rules);

		if ($validation->passes())
		{
			$this->CierreCaja->create($input);

			return Redirect::route('CierreCajas.index');
		}

		return Redirect::route('CierreCajas.create')
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
		$CierreCaja = $this->CierreCaja->findOrFail($id);

		return View::make('CierreCajas.show', compact('CierreCaja'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CierreCaja = $this->CierreCaja->find($id);

		if (is_null($CierreCaja))
		{
			return Redirect::route('CierreCajas.index');
		}

		return View::make('CierreCajas.edit', compact('CierreCaja'));
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
		$validation = Validator::make($input, CierreCaja::$rules);

		if ($validation->passes())
		{
			$CierreCaja = $this->CierreCaja->find($id);
			$CierreCaja->update($input);

			return Redirect::route('CierreCajas.show', $id);
		}

		return Redirect::route('CierreCajas.edit', $id)
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
		$this->CierreCaja->find($id)->delete();

		return Redirect::route('CierreCajas.index');
	}

}
