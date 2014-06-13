<?php

class PeriodoCierreDeCajasController extends BaseController {

	/**
	 * PeriodoCierreDeCaja Repository
	 *
	 * @var PeriodoCierreDeCaja
	 */
	protected $PeriodoCierreDeCaja;

	public function __construct(PeriodoCierreDeCaja $PeriodoCierreDeCaja)
	{
		$this->PeriodoCierreDeCaja = $PeriodoCierreDeCaja;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		if (Seguridad::VerPeriodoDeCierre()) {
			$PeriodoCierreDeCajas = PeriodoCierreDeCaja::where('VEN_PeriodoCierreDeCaja_Estado', 1)->get();
			return View::make('PeriodoCierreDeCajas.index', compact('PeriodoCierreDeCajas'));
		} else {
			return Redirect::to('/403');
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		if (Seguridad::CrearPeriodoDeCierre()) {
			return View::make('PeriodoCierreDeCajas.create');
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
		if (Seguridad::CrearPeriodoDeCierre()) {
			$input = Input::all();
			$hora = $input['VEN_PeriodoCierreDeCaja_Hora'];
			$min = $input['VEN_PeriodoCierreDeCaja_Min'];
			unset($input['VEN_PeriodoCierreDeCaja_Hora']);
			unset($input['VEN_PeriodoCierreDeCaja_Min']);
			unset($input['VEN_PeriodoCierreDeCaja_PA']);
			$input['VEN_PeriodoCierreDeCaja_HoraPartida'] = $hora .":" . $min;
			//return $input;
			$validation = Validator::make($input, PeriodoCierreDeCaja::$rules);

			if ($validation->passes())
			{
				$this->PeriodoCierreDeCaja->create($input);

				return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
			}

			return Redirect::route('Ventas.PeriodoCierreDeCajas.create')
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
		if (Seguridad::VerPeriodoDeCierre()) {
			$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->findOrFail($id);

			return View::make('PeriodoCierreDeCajas.show', compact('PeriodoCierreDeCaja'));
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
		if (Seguridad::EditarPeriodoDeCierre()) {
			$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->find($id);
			if (is_null($PeriodoCierreDeCaja)){
				return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
			}
			$HoraPartida = $PeriodoCierreDeCaja['VEN_PeriodoCierreDeCaja_HoraPartida'];
			$hora = substr($HoraPartida,0,2);
			$min = substr($HoraPartida,3,2);
			$PeriodoCierreDeCaja['VEN_PeriodoCierreDeCaja_Hora'] = $hora;
			$PeriodoCierreDeCaja['VEN_PeriodoCierreDeCaja_Min'] = $min;
			return View::make('PeriodoCierreDeCajas.edit', compact('PeriodoCierreDeCaja'));
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
		if (Seguridad::EditarPeriodoDeCierre()) {
			$input = array_except(Input::all(), '_method');
			$hora = $input['VEN_PeriodoCierreDeCaja_Hora'];
			$min = $input['VEN_PeriodoCierreDeCaja_Min'];
			unset($input['VEN_PeriodoCierreDeCaja_Hora']);
			unset($input['VEN_PeriodoCierreDeCaja_Min']);
			unset($input['VEN_PeriodoCierreDeCaja_PA']);
			$input['VEN_PeriodoCierreDeCaja_HoraPartida'] = $hora .":" . $min;
			$validation = Validator::make($input, PeriodoCierreDeCaja::$rulesUpdate);

			

			if ($validation->passes())
			{
				$PeriodoCierreDeCaja = $this->PeriodoCierreDeCaja->find($id);
				$PeriodoCierreDeCaja->update($input);

				return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
			}

			return Redirect::route('Ventas.PeriodoCierreDeCajas.edit', $id)
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
		if (Seguridad::BorrarPeriodoDeCierre()) {
			$PDDC = PeriodoCierreDeCaja::find($id);
			$PDDC->VEN_PeriodoCierreDeCaja_Estado = 0;
			$PDDC->save();

			return Redirect::route('Ventas.PeriodoCierreDeCajas.index');
		} else {
			return Redirect::to('/403');
		}
	}

}
