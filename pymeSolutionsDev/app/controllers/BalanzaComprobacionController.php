<?php

class BalanzaComprobacionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $BalanzaComprobacion;

	public function __construct(BalanzaComprobacion $BalanzaComprobacion)
	{
		$this->BalanzaComprobacion = $BalanzaComprobacion;
	}

	public function index()
	{
		$Periodo = PeriodoContable::first();
		$Cuentas = DB::statement(DB::raw('CALL CON_BalanzaComprobacion(' . $Periodo->CON_PeriodoContable_ID . ');'));
		return View::make('BalanzaComprobacion.index')
			->with('Cuentas',$Cuentas);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  	
       
      
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function cargarcuentas(){

		if(Request::ajax()){
			$CuentaMotivo= CuentaMotivo::where('CON_MotivoTransaccion_ID','=',Input::get('id'))->get();
			$Debe= CatalogoContable::find($CuentaMotivo[0]->CON_CatalogoContable_ID);
			$Debe=$Debe->CON_CatalogoContable_Nombre;
			$Haber = CatalogoContable::find($CuentaMotivo[1]->CON_CatalogoContable_ID);
			$Haber=$Haber->CON_CatalogoContable_Nombre; 
			//return json_encode(array($Debe,$Haber));
			return Response::json(array(
				'v1'=> $Debe,
				'v2'=> $Haber
				));
		}
	}

	public function crearmotivo(){
		if(Request::ajax()){
			 $Cuentas  = CatalogoContable::all()->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
			return View::make('MotivoTransaccion.create')
			->with('Cuentas',$Cuentas);
		}
	}

	public function creandomotivo(){

		if(Request::ajax()){
			$input=Input::all();
			$rules = array(
	            'CON_MotivoTransaccion_Codigo' => 'required|unique:CON_MotivoTransaccion,CON_MotivoTransaccion_Codigo',
	            'CON_MotivoTransaccion_Descripcion' => 'required|alpha_spaces',
	            'CON_CatalogoContable_Debe' => 'required',
	            'CON_CatalogoContable_Haber' => 'required'
	        );
			$validation= Validator::make($input,$rules);

			if ($validation->passes()) {
				$MotivoTransaccion = new MotivoTransaccion;
				$MotivoTransaccion->CON_MotivoTransaccion_Codigo = Input::get('CON_MotivoTransaccion_Codigo');
				$MotivoTransaccion->CON_MotivoTransaccion_Descripcion = Input::get('CON_MotivoTransaccion_Descripcion');
				if($MotivoTransaccion->save()){
					$CuentaMotivo = new CuentaMotivo;
					$CuentaMotivo->CON_MotivoTransaccion_ID = $MotivoTransaccion->CON_MotivoTransaccion_ID;
					$CuentaMotivo->CON_CatalogoContable_ID	=	Input::get('CON_CatalogoContable_Debe');
					$CuentaMotivo->CON_CuentaMotivo_DebeHaber = 0;
					if($CuentaMotivo->save()){
						$CuentaMotivos = new CuentaMotivo;
						$CuentaMotivos->CON_MotivoTransaccion_ID = $MotivoTransaccion->CON_MotivoTransaccion_ID;
						$CuentaMotivos->CON_CatalogoContable_ID	=	Input::get('CON_CatalogoContable_Haber');
						$CuentaMotivos->CON_CuentaMotivo_DebeHaber = 1;
						$CuentaMotivos->save();
					}
				}
				//$Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
				//return Response::json(array('html'=>Form::select('CON_MotivoTransaccion_ID',$Motivos,'',array('class'=>'form-control')))); 
			}else{
				$errors = $validation->errors();
							return Response::json(array('success'=>false,
									'html'=> View::make('_messages.errors',array('errors'=>$errors))->render()
								));
							
				 
			}
		}
		
	}

	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, BalanzaComprobacion::$rules);

		if ($validation->passes())
		{
			$input['CON_BalanzaComprobacion_FechaCreacion']= date('Y-m-d');
			$input['CON_BalanzaComprobacion_FechaModificacion'] =date('Y-m-d');
			$this->BalanzaComprobacion->create($input);

			return Redirect::action('BalanzaComprobacionController@index');
		}

		return Redirect::action('BalanzaComprobacionController@create')
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
        return View::make('BalanzaComprobacion.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('BalanzaComprobacion.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
