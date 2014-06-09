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
		if (Seguridad::listarFormaPago()) {
			$FormaPagos = $this->FormaPago->all();
			return View::make('FormaPagos.index', compact('FormaPagos'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		if (Seguridad::crearFormaPago()) {
			return View::make('FormaPagos.create');
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		if (Seguridad::crearFormaPago()) {
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
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Seguridad::listarFormaPago()) {
			$FormaPago = $this->FormaPago->findOrFail($id);
			return View::make('FormaPagos.show', compact('FormaPago'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		if (Seguridad::editarFormaPago()) {
			$FormaPago = $this->FormaPago->find($id);
			if (is_null($FormaPago))
			{
				return Redirect::route('Inventario.FormaPagos.index');
			}
			return View::make('FormaPagos.edit', compact('FormaPago'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Seguridad::editarFormaPago()) {
			$input = Input::except('_method');
			$validation = Validator::make($input, FormaPago::$rules);
			if ($validation->passes())
			{
				$FormaPago = $this->FormaPago->find($id);
				$FormaPago->update($input);
				return Redirect::route('Inventario.FormaPagos.index', $id);
			}
			return Redirect::route('Inventario.FormaPagos.edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Seguridad::listarFormaPago()) {
			$this->FormaPago->find($id)->delete();
			return Redirect::route('Inventario.FormaPagos.index');
		} else {
			return Redirect::to('/403');
		}
	}

	public function returnUser()
	{
		
		return 'usuario';

	}

}
