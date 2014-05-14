<?php

class ConceptoMotivoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $ConceptoMotivo;

	public function __construct(ConceptoMotivo $ConceptoMotivo)
	{
		$this->ConceptoMotivo = $ConceptoMotivo;
	}

	public function index()
	{
		$conceptos = ConceptoMotivo::all();
		$Motiv     = MotivoTransaccion::all();
        return View::make('ConceptoMotivo.index')
        -> with('ConceptoMotivos',$conceptos)
        -> with('Moti',$Motiv);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	   $Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
      	$Periodo=false;
      	if(ClasificacionPeriodo::all()->count())
      		$Periodo=true;
       return View::make('ConceptoMotivo.create')
       		->with('Motivos',$Motivos)
       		->with('PeriodoContable',$Periodo);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function cargarcuentas(){

		if(Request::ajax()){
			$CuentaMotivo= CuentaMotivo::where('CON_MotivoTransaccion_ID','=',Input::get('id'))->get();
			if ($CuentaMotivo[0]->CON_CuentaMotivo_DebeHaber==0){
			   $Debe= CatalogoContable::find($CuentaMotivo[0]->CON_CatalogoContable_ID);
				$Haber = CatalogoContable::find($CuentaMotivo[1]->CON_CatalogoContable_ID);
			}
			else{
				$Haber = CatalogoContable::find($CuentaMotivo[0]->CON_CatalogoContable_ID);
				$Debe = CatalogoContable::find($CuentaMotivo[1]->CON_CatalogoContable_ID);
			}
			$Debe=$Debe->CON_CatalogoContable_Nombre;
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
			$habilitadas = CatalogoContable::where('CON_CatalogoContable_Estado','=',1)->get();
			$Cuentas  = $habilitadas->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
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
	            'CON_CatalogoContable_Debe' => 'required|different:CON_CatalogoContable_Haber',
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
		$validation = Validator::make($input, ConceptoMotivo::$rules);

		if ($validation->passes())
		{
			//$input['CON_ConceptoMotivo_FechaCreacion']= date('Y-m-d');
			//$input['CON_ConceptoMotivo_FechaModificacion'] =date('Y-m-d');
			$this->ConceptoMotivo->create($input);

			return Redirect::action('ConceptoMotivoController@index');
		}

		return Redirect::action('ConceptoMotivoController@create')
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
        return View::make('Asientos.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $CM = $this->ConceptoMotivo->find($id);

		if (is_null($CM))
		{
			return Redirect::action('ConceptoMotivoController@index');
		}
        return View::make('ConceptoMotivo.edit')
        	->with('ConceptoMotivos',$CM);
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
		$validation = Validator::make($input, ConceptoMotivo::$rules);

		if ($validation->passes())
		{
			$motivo = $this->ConceptoMotivo->find($id);
			$motivo->update($input);

			return Redirect::action('ConceptoMotivoController@index');
		}

		return Redirect::action('ConceptoMotivoController@edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');//
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
