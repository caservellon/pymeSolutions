<?php

class ProveedorCampoLocalsController extends BaseController {

	/**
	 * ProveedorCampoLocal Repository
	 *
	 * @var ProveedorCampoLocal
	 */
	protected $ProveedorCampoLocal;

	public function __construct(ProveedorCampoLocal $ProveedorCampoLocal)
	{
		$this->ProveedorCampoLocal = $ProveedorCampoLocal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ProveedorCampoLocals = $this->ProveedorCampoLocal->all();

		return View::make('ProveedorCampoLocals.index', compact('ProveedorCampoLocals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ProveedorCampoLocals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ProveedorCampoLocal::$rules);

		if ($validation->passes())
		{
			$this->ProveedorCampoLocal->create($input);

			return Redirect::route('ProveedorCampoLocals.index');
		}

		return Redirect::route('ProveedorCampoLocals.create')
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
		$ProveedorCampoLocal = $this->ProveedorCampoLocal->findOrFail($id);

		return View::make('ProveedorCampoLocals.show', compact('ProveedorCampoLocal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ProveedorCampoLocal = $this->ProveedorCampoLocal->find($id);

		if (is_null($ProveedorCampoLocal))
		{
			return Redirect::route('ProveedorCampoLocals.index');
		}

		return View::make('ProveedorCampoLocals.edit', compact('ProveedorCampoLocal'));
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
		$validation = Validator::make($input, ProveedorCampoLocal::$rules);

		if ($validation->passes())
		{
			$ProveedorCampoLocal = $this->ProveedorCampoLocal->find($id);
			$ProveedorCampoLocal->update($input);

			return Redirect::route('ProveedorCampoLocals.show', $id);
		}

		return Redirect::route('ProveedorCampoLocals.edit', $id)
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
		$this->ProveedorCampoLocal->find($id)->delete();

		return Redirect::route('ProveedorCampoLocals.index');
	}

}
