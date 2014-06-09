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
		if (Seguridad::ListarMotivosDeInventario()) {
			$Conceptos=invContabilidad:: getMotivos();
			$MotivoInventarios = $this->MotivoInventario->all();

			return View::make('MotivoInventarios.index', compact('MotivoInventarios','Conceptos'));
		}else{
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
		if (Seguridad::ConfigurarMotivosDeInventario()) {
			return View::make('MotivoInventarios.create');
		}else{
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
		if (Seguridad::ConfigurarMotivosDeInventario()) {
			$input = Input::all();
			$validation = Validator::make($input, MotivoInventario::$rules);

			if ($validation->passes())
			{
				$this->MotivoInventario->create($input);
				invContabilidad::Activar($input['CON_MotivoInventario_ID']);
				return Redirect::action('MotivoInventariosController@index');

			}

			return Redirect::route('MotivoInventarios.create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		}else{
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
		if (Seguridad::ConfigurarMotivosDeInventario()) {
			$MotivoInventario = $this->MotivoInventario->find($id);
			$Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
		   $concepto = invContabilidad:: getMotivos()->find($id);

			if (is_null($MotivoInventario))
			{

		   
	      	return View::make('MotivoInventarios.create',compact('id','Motivos','concepto'));
		

			}

			return View::make('MotivoInventarios.edit', compact('MotivoInventario','Motivos','concepto'));
		}else{
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
		if (Seguridad::ConfigurarMotivosDeInventario()) {
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
		}else{
				return Redirect::to('/403');
		}
	}


	public function activar(){

		// $motivo = invContabilidad::getMotivos();

		if (Seguridad::ConfigurarMotivosDeInventario()) {
			return View::make('MotivoInventarios.activar');
		}else{
			return Redirect::to('/403');
		}
	}

}

