<?php

class FormaPagoVentaController extends BaseController {

	/**
	 * FormaPagoVentum Repository
	 *
	 * @var FormaPagoVentum
	 */
	protected $FormaPagoVentum;

	public function __construct(FormaPagoVentum $FormaPagoVentum)
	{
		$this->FormaPagoVentum = $FormaPagoVentum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$FormaPagoVenta = $this->FormaPagoVentum->all();

		return View::make('FormaPagoVenta.index', compact('FormaPagoVenta'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('FormaPagoVenta.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, FormaPagoVentum::$rules);

		if ($validation->passes())
		{
			$this->FormaPagoVentum->create($input);

			return Redirect::route('FormaPagoVenta.index');
		}

		return Redirect::route('FormaPagoVenta.create')
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
		$FormaPagoVentum = $this->FormaPagoVentum->findOrFail($id);

		return View::make('FormaPagoVenta.show', compact('FormaPagoVentum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$FormaPagoVentum = $this->FormaPagoVentum->find($id);

		if (is_null($FormaPagoVentum))
		{
			return Redirect::route('FormaPagoVenta.index');
		}

		return View::make('FormaPagoVenta.edit', compact('FormaPagoVentum'));
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
		$validation = Validator::make($input, FormaPagoVentum::$rules);

		if ($validation->passes())
		{
			$FormaPagoVentum = $this->FormaPagoVentum->find($id);
			$FormaPagoVentum->update($input);

			return Redirect::route('FormaPagoVenta.show', $id);
		}

		return Redirect::route('FormaPagoVenta.edit', $id)
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
		$this->FormaPagoVentum->find($id)->delete();

		return Redirect::route('FormaPagoVenta.index');
	}

}
