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
			$Conceptos=MotivoMovimiento::
				select('MT.CON_MotivoTransaccion_Descripcion','INV_MotivoMovimiento.*')
				->leftjoin ('CON_MotivoInventario as MI','INV_MotivoMovimiento_ID','=','MI.CON_MotivoInventario_ID')
				->leftjoin('CON_MotivoTransaccion as MT','MT.CON_MotivoTransaccion_ID','=','MI.CON_MotivoTransaccion_ID')->get();
			return View::make('MotivoInventarios.index', compact('Conceptos'));
		}else{
				return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if (Seguridad::ConfigurarMotivosDeInventario()) {
			$MotivoInventario=null;
			$Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
			$concepto = invContabilidad:: getMotivos()->find($id);
			$action="MotivoInventariosController@store";
			return View::make('MotivoInventarios.edit',compact('MotivoInventario','id','Motivos','concepto','action'));
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

			return View::make('MotivoInventarios.edit',$id)
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

			if (is_null($MotivoInventario)){
	      		return Redirect::route('con.motivoinventario.crear',$id);
			}

			$Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
		   	$concepto = invContabilidad:: getMotivos()->find($id);
			$action=array("con.motivoinventario.update");
			return View::make('MotivoInventarios.edit', compact('MotivoInventario','id','Motivos','concepto','action'));
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
	public function update()
	{
		
		if (Seguridad::ConfigurarMotivosDeInventario()) {
			$input = Input::except('_method');
			$id=$input['CON_MotivoInventario_ID'];
			$validation = Validator::make($input, MotivoInventario::$rules);

			if ($validation->passes())
			{
				$MotivoInventario = $this->MotivoInventario->find($id);
				$MotivoInventario->update($input);

				$Conceptos=invContabilidad:: getMotivos();
			$MotivoInventarios = $this->MotivoInventario->all();

			return Redirect::action('MotivoInventariosController@index');
			}
			return View::make('MotivoInventarios.edit',$id)
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

