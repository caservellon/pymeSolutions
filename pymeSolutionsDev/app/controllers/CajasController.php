<?php

class CajasController extends BaseController {

	/**
	 * Caja Repository
	 *
	 * @var Caja
	 */
	protected $Caja;

	public function __construct(Caja $Caja)
	{
		$this->Caja = $Caja;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Cajas = $this->Caja->where("VEN_Caja_Estado",1)->get();
		//return $Cajas;
		return View::make('Cajas.index', compact('Cajas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$periodos = PeriodoCierreDeCaja::lists('VEN_PeriodoCierreDeCaja_Codigo', 'VEN_PeriodoCierreDeCaja_id');
		return View::make('Cajas.create', compact('periodos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Caja::$rules);

		if ($validation->passes())
		{
		
			$this->Caja->create($input);

			return Redirect::route('Ventas.Cajas.index');
		}

		return Redirect::route('Ventas.Cajas.create')
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
		$Caja = $this->Caja->findOrFail($id);

		return View::make('Cajas.show', compact('Caja'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Caja = $this->Caja->find($id);
		$periodos = PeriodoCierreDeCaja::lists('VEN_PeriodoCierreDeCaja_Codigo', 'VEN_PeriodoCierreDeCaja_id');

		if (is_null($Caja))
		{
			return Redirect::route('Ventas.Cajas.index');
		}

		return View::make('Cajas.edit', compact('Caja', 'periodos'));
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
		$validation = Validator::make($input, Caja::$rulesUpdate);

		if ($validation->passes())
		{
			$Caja = $this->Caja->find($id);
			$Caja->update($input);

			return Redirect::route('Ventas.Cajas.index');
		}

		return Redirect::route('Ventas.Cajas.edit', $id)
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
		$box = Caja::find($id);
		$box->VEN_Caja_Estado = 0;
		$box->save();

		return Redirect::route('Ventas.Cajas.index');
	}

}
