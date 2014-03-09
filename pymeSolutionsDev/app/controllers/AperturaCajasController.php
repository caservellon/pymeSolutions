<?php

class AperturaCajasController extends BaseController {

	/**
	 * AperturaCaja Repository
	 *
	 * @var AperturaCaja
	 */
	protected $AperturaCaja;

	public function __construct(AperturaCaja $AperturaCaja)
	{
		$this->AperturaCaja = $AperturaCaja;
	}

	/**
	 * Apertura de Caja.
	 *
	 * @return Response
	 */
	public function abrir($id)
	{
		$Caja = Caja::find($id);
		$Caja->VEN_Caja_Estado = 0;
		$Caja->save();

		$AperturaActual = new AperturaCaja;
		$AperturaActual->VEN_Caja_VEN_Caja_id = $id;
		$AperturaActual->VEN_AperturaCaja_TimeStamp = date("Y-m-d H:i:s");
		$AperturaActual->VEN_FormaPago_Gerente = "Gerente Temporal";
		$AperturaActual->VEN_FormaPago_Cajero = "Cajero Temporal";
		$AperturaActual->save();

		return Redirect::route('Ventas.AperturaCajas.index');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CajasDisponibles = Caja::all();
		$AperturaCajas = $this->AperturaCaja->all();

		return View::make('AperturaCajas.index', compact('CajasDisponibles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('AperturaCajas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, AperturaCaja::$rules);

		if ($validation->passes())
		{
			$this->AperturaCaja->create($input);

			return Redirect::route('Ventas.AperturaCajas.index');
		}

		return Redirect::route('Ventas.AperturaCajas.create')
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
		$AperturaCaja = $this->AperturaCaja->findOrFail($id);

		return View::make('AperturaCajas.show', compact('AperturaCaja'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$AperturaCaja = $this->AperturaCaja->find($id);

		if (is_null($AperturaCaja))
		{
			return Redirect::route('Ventas.AperturaCajas.index');
		}

		return View::make('AperturaCajas.edit', compact('AperturaCaja'));
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
		$validation = Validator::make($input, AperturaCaja::$rules);

		if ($validation->passes())
		{
			$AperturaCaja = $this->AperturaCaja->find($id);
			$AperturaCaja->update($input);

			return Redirect::route('Ventas.AperturaCajas.show', $id);
		}

		return Redirect::route('Ventas.AperturaCajas.edit', $id)
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
		$this->AperturaCaja->find($id)->delete();

		return Redirect::route('Ventas.AperturaCajas.index');
	}

}
