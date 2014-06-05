<?php

class BalanceGeneralsController extends BaseController {

	/**
	 * BalanceGeneral Repository
	 *
	 * @var BalanceGeneral
	 */
	protected $BalanceGeneral;

	public function __construct(BalanceGeneral $BalanceGeneral)
	{
		$this->BalanceGeneral = $BalanceGeneral;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$BalanceGenerals = $this->BalanceGeneral->all();

		return View::make('BalanceGenerals.index', compact('BalanceGenerals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('BalanceGenerals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, BalanceGeneral::$rules);

		if ($validation->passes())
		{
			$this->BalanceGeneral->create($input);

			return Redirect::route('BalanceGenerals.index');
		}

		return Redirect::route('BalanceGenerals.create')
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
		$BalanceGeneral = $this->BalanceGeneral->findOrFail($id);
		$CuentasT = DB::table('CON_CatalogoContable')
            ->join('CON_CuentaT', 'CON_CatalogoContable.CON_CatalogoContable_ID', '=', 'CON_CuentaT.CON_CatalogoContable_ID')
            ->join('CON_LibroMayor', 'CON_LibroMayor.CON_LibroMayor_ID', '=', 'CON_CuentaT.CON_LibroMayor_ID')
            ->select('CON_CatalogoContable.CON_CatalogoContable_Nombre', 'CON_CuentaT.CON_CuentaT_SaldoFinal', 'CON_CatalogoContable.CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID')
            ->get();					

		return View::make('BalanceGenerals.show', compact('BalanceGeneral',"CuentasT"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$BalanceGeneral = $this->BalanceGeneral->find($id);

		if (is_null($BalanceGeneral))
		{
			return Redirect::route('BalanceGenerals.index');
		}

		return View::make('BalanceGenerals.edit', compact('BalanceGeneral'));
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
		$validation = Validator::make($input, BalanceGeneral::$rules);

		if ($validation->passes())
		{
			$BalanceGeneral = $this->BalanceGeneral->find($id);
			$BalanceGeneral->update($input);

			return Redirect::route('BalanceGenerals.show', $id);
		}

		return Redirect::route('BalanceGenerals.edit', $id)
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
		$this->BalanceGeneral->find($id)->delete();

		return Redirect::route('BalanceGenerals.index');
	}

}
