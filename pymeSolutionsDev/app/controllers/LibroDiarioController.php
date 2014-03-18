<?php

class LibroDiarioController extends BaseController {

	/**
	 * LibroDiario Repository
	 *
	 * @var LibroDiario
	 */
	protected $LibroDiario;

	public function __construct(LibroDiario $LibroDiario)
	{
		$this->LibroDiario = $LibroDiario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		
		if(Request::Ajax()){
			$LibroDiario = $this->LibroDiario->where('CON_LibroDiario_FechaCreacion','>=',Input::get('date1')
				,'and','CON_LibroDiario_FechaCreacion','<=',Input::get('date2'))->get();
			$Asientos=$this->getAsientos($LibroDiario);
			return View::make('LibroDiario.table')
				->with('LibroDiario',$Asientos);
		}else{
			$LibroDiario = $this->LibroDiario->all();
			$Asientos=$this->getAsientos($LibroDiario);
			$PeriodoContable = PeriodoContable::orderBy('CON_PeriodoContable_FechaInicio')->first();
			return View::make('LibroDiario.index')
				->with('PeriodoContable',$PeriodoContable)
				->with('LibroDiario',$Asientos);
		}
	}

	protected function getAsientos($LibroDiario){
		$Asientos=array();
		foreach ($LibroDiario as $Asiento) {
			$Cuentas=CuentaMotivo::where('CON_MotivoTransaccion_ID','=',$Asiento->CON_MotivoTransaccion_ID)->get();
			$Debe= CatalogoContable::find($Cuentas[0]->CON_CatalogoContable_ID);
			$Debe=$Debe->CON_CatalogoContable_Nombre;
			$Haber = CatalogoContable::find($Cuentas[1]->CON_CatalogoContable_ID);
			$Haber=$Haber->CON_CatalogoContable_Nombre; 
			$Asientos[$Asiento->CON_LibroDiario_ID][0]=array(
				'no'=> $Asiento->CON_LibroDiario_ID,
				'fecha'=> $Asiento->CON_LibroDiario_FechaCreacion,
				'cuenta'=>$Debe,
				'observacion'=>$Asiento->CON_LibroDiario_Observacion,
				'monto'=>$Asiento->CON_LibroDiario_Monto);
			$Asientos[$Asiento->CON_LibroDiario_ID][1]=array(
				'cuenta'=>"\t".$Haber,
				'monto'=> $Asiento->CON_LibroDiario_Monto);
		}
		return $Asientos;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('LibroDiarios.create');
	}

	Public function reversion($id){
	 	$motivo = MotivoTransaccion::find(LibroDiario::find($id)->CON_MotivoTransaccion_ID);
		if(isset($motivo) && $motivo->count()){
			$libro = new LibroDiario;
			$libro->CON_LibroDiario_Monto = LibroDiario::find($id)->CON_LibroDiario_Monto;
			$libro->CON_MotivoTransaccion_ID = $motivo->CON_MotivoTransaccion_ID;
			$libro->CON_LibroDiario_Observacion = "Es una reversion del Asiento No." . $id;
			$libro->CON_LibroDiario_FechaCreacion = date('Y-m-d');
			$libro->CON_LibroDiario_FechaModificion = date('Y-m-d');
			$libro->save();
			return Redirect::action('LibroDiarioController@index');
		}else{
			return Route::resource('contabilidad');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$LibroDiario = $this->LibroDiario->findOrFail($id);

		return View::make('LibroDiarios.show', compact('LibroDiario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$LibroDiario = $this->LibroDiario->find($id);

		if (is_null($LibroDiario))
		{
			return Redirect::route('LibroDiarios.index');
		}

		return View::make('LibroDiarios.edit', compact('LibroDiario'));
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
		$validation = Validator::make($input, LibroDiario::$rules);

		if ($validation->passes())
		{
			$LibroDiario = $this->LibroDiario->find($id);
			$LibroDiario->update($input);

			return Redirect::route('LibroDiarios.show', $id);
		}

		return Redirect::route('LibroDiarios.edit', $id)
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
		$this->LibroDiario->find($id)->delete();

		return Redirect::route('LibroDiarios.index');
	}

}
