<?php

class SubcuentaController extends BaseController {

	/**
	 * Subcuentum Repository
	 *
	 * @var Subcuentum
	 */
	protected $Subcuentum;

	public function __construct(Subcuentum $Subcuentum)
	{
		$this->Subcuentum = $Subcuentum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Subcuenta = $this->Subcuentum->all();
		$Catalogo = CatalogoContable::all();
		$Clasificacion =ClasificacionCuenta::all();

		return View::make('Subcuenta.index', compact('Subcuenta','Catalogo','Clasificacion'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Catalogo =CatalogoContable::all()->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
    	$selected = array();
		return View::make('Subcuenta.create',compact('Catalogo','selected'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subcuentum::$rules);

		if ($validation->passes())
		{
			$this->Subcuentum->create($input);

			return Redirect::route('subcuenta.index');
		}
		$Catalogo =CatalogoContable::all()->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
    	$selected = array();

		return Redirect::route('subcuenta.create',compact('Catalogo','selected'))
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
		$Subcuentum = $this->Subcuentum->findOrFail($id);

		return View::make('Subcuenta.show', compact('Subcuentum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Subcuentum = $this->Subcuentum->find($id);

		if (is_null($Subcuentum))
		{
			return Redirect::route('subcuenta.index');
		}

		return View::make('Subcuenta.edit', compact('Subcuentum'));
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
		$validation = Validator::make($input, Subcuentum::$rules);

		if ($validation->passes())
		{
			$Subcuentum = $this->Subcuentum->find($id);
			$Subcuentum->update($input);

			return Redirect::route('subcuenta.show', $id);
		}

		return Redirect::route('subcuenta.edit', $id)
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
		$this->Subcuentum->find($id)->delete();

		return Redirect::route('subcuenta.index');
	}

}
