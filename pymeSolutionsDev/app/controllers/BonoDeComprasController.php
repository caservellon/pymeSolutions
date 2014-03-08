<?php

class BonoDeComprasController extends BaseController {

	/**
	 * BonoDeCompra Repository
	 *
	 * @var BonoDeCompra
	 */
	protected $BonoDeCompra;

	public function __construct(BonoDeCompra $BonoDeCompra)
	{
		$this->BonoDeCompra = $BonoDeCompra;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$BonoDeCompras = $this->BonoDeCompra->all();

		return View::make('BonoDeCompras.index', compact('BonoDeCompras'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('BonoDeCompras.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, BonoDeCompra::$rules);

		if ($validation->passes())
		{
			$this->BonoDeCompra->create($input);

			return Redirect::route('Ventas.BonoDeCompras.index');
		}

		return Redirect::route('Ventas.BonoDeCompras.create')
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
		$BonoDeCompra = $this->BonoDeCompra->findOrFail($id);

		return View::make('BonoDeCompras.show', compact('BonoDeCompra'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$BonoDeCompra = $this->BonoDeCompra->find($id);

		if (is_null($BonoDeCompra))
		{
			return Redirect::route('Ventas.BonoDeCompras.index');
		}

		return View::make('BonoDeCompras.edit', compact('BonoDeCompra'));
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
		$validation = Validator::make($input, BonoDeCompra::$rules);

		if ($validation->passes())
		{
			$BonoDeCompra = $this->BonoDeCompra->find($id);
			$BonoDeCompra->update($input);

			return Redirect::route('Ventas.BonoDeCompras.show', $id);
		}

		return Redirect::route('Ventas.BonoDeCompras.edit', $id)
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
		$this->BonoDeCompra->find($id)->delete();

		return Redirect::route('Ventas.BonoDeCompras.index');
	}

}
