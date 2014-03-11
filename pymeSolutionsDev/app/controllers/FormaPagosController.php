<?php

class FormaPagosController extends BaseController {

	/**
	 * FormaPago Repository
	 *
	 * @var FormaPago
	 */
	protected $FormaPago;

	public function __construct(FormaPago $FormaPago)
	{
		$this->FormaPago = $FormaPago;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$FormaPagos = $this->FormaPago->all();

		return View::make('FormaPagos.index', compact('FormaPagos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('FormaPagos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, FormaPago::$rules);

		if ($validation->passes())
		{
			$this->FormaPago->create($input);

			return Redirect::route('Inventario.FormaPagos.index');
		}

		return Redirect::route('Inventario.FormaPagos.create')

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
		$FormaPago = $this->FormaPago->findOrFail($id);

		return View::make('FormaPagos.show', compact('FormaPago'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$FormaPago = $this->FormaPago->find($id);

		if (is_null($FormaPago))
		{
			return Redirect::route('Inventario.FormaPagos.index');

		}

		return View::make('FormaPagos.edit', compact('FormaPago'));
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

		$validation = Validator::make($input, FormaPago::$rules);

		if ($validation->passes())
		{
			$FormaPago = $this->FormaPago->find($id);
			$FormaPago->update($input);

			return Redirect::route('Inventario.FormaPagos.show', $id);
		}

		return Redirect::route('Inventario.FormaPagos.edit', $id)

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
		$this->FormaPago->find($id)->delete();

		return Redirect::route('Inventario.FormaPagos.index');
	}

	public function returnUser()
	{
		
		return 'usuario';

	}

}
