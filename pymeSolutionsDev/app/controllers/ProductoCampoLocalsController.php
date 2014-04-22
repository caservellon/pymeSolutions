<?php

class ProductoCampoLocalsController extends BaseController {

	/**
	 * ProductoCampoLocal Repository
	 *
	 * @var ProductoCampoLocal
	 */
	protected $ProductoCampoLocal;

	public function __construct(ProductoCampoLocal $ProductoCampoLocal)
	{
		$this->ProductoCampoLocal = $ProductoCampoLocal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ProductoCampoLocals = $this->ProductoCampoLocal->all();

		return View::make('ProductoCampoLocals.index', compact('ProductoCampoLocals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ProductoCampoLocals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ProductoCampoLocal::$rules);

		if ($validation->passes())
		{
			$this->ProductoCampoLocal->create($input);

			return Redirect::route('ProductoCampoLocals.index');
		}

		return Redirect::route('ProductoCampoLocals.create')
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
		$ProductoCampoLocal = $this->ProductoCampoLocal->findOrFail($id);

		return View::make('ProductoCampoLocals.show', compact('ProductoCampoLocal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ProductoCampoLocal = $this->ProductoCampoLocal->find($id);

		if (is_null($ProductoCampoLocal))
		{
			return Redirect::route('ProductoCampoLocals.index');
		}

		return View::make('ProductoCampoLocals.edit', compact('ProductoCampoLocal'));
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
		$validation = Validator::make($input, ProductoCampoLocal::$rules);

		if ($validation->passes())
		{
			$ProductoCampoLocal = $this->ProductoCampoLocal->find($id);
			$ProductoCampoLocal->update($input);

			return Redirect::route('ProductoCampoLocals.show', $id);
		}

		return Redirect::route('ProductoCampoLocals.edit', $id)
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
		$this->ProductoCampoLocal->find($id)->delete();

		return Redirect::route('ProductoCampoLocals.index');
	}

}
