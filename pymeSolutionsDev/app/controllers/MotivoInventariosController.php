<?php

class MotivoInventariosController extends BaseController {

	/**
	 * MotivoInventario Repository
	 *
	 * @var MotivoInventario
	 */
	protected $MotivoInventario;

	public function __construct(MotivoInventario $MotivoInventario)
	{
		$this->MotivoInventario = $MotivoInventario;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$Conceptos=invContabilidad:: getMotivos();
		$MotivoInventarios = $this->MotivoInventario->all();

		return View::make('MotivoInventarios.index', compact('MotivoInventarios','Conceptos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('MotivoInventarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MotivoInventario::$rules);

		if ($validation->passes())
		{
			return invContabilidad::Activar($input['CON_MotivoInventario_ID']);
			$this->MotivoInventario->create($input);
			return Redirect::action('MotivoInventariosController@index');

		}

		return Redirect::route('MotivoInventarios.create')
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
		$MotivoInventario = $this->MotivoInventario->findOrFail($id);

		return View::make('MotivoInventarios.show', compact('MotivoInventario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$MotivoInventario = $this->MotivoInventario->find($id);
		$Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
	   $concepto = invContabilidad:: getMotivos()->find($id);

		if (is_null($MotivoInventario))
		{

	   
      	return View::make('MotivoInventarios.create',compact('id','Motivos','concepto'));
	

		}

		return View::make('MotivoInventarios.edit', compact('MotivoInventario','Motivos','concepto'));
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
		$validation = Validator::make($input, MotivoInventario::$rules);

		if ($validation->passes())
		{
			$MotivoInventario = $this->MotivoInventario->find($id);
			$MotivoInventario->update($input);

			$Conceptos=invContabilidad:: getMotivos();
		$MotivoInventarios = $this->MotivoInventario->all();

		return View::make('MotivoInventarios.index', compact('MotivoInventarios','Conceptos'));
		}

		return Redirect::route('MotivoInventarios.edit', $id)
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
		$this->MotivoInventario->find($id)->delete();

		return Redirect::route('MotivoInventarios.index');
	}


	public function activar(){

		// $motivo = invContabilidad::getMotivos();

		
		return View::make('MotivoInventarios.activar');


	}

}

