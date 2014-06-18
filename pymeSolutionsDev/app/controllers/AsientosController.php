<?php

class AsientosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		$Asientos = LibroDiario::all();
        return Redirect::action('AsientosController@create');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Seguridad::CrearAsientosContable()) {
		   $Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
	      	$Periodo=false;
	      	$UM=UnidadMonetaria::all()->lists('CON_UnidadMonetaria_Nombre','CON_UnidadMonetaria_ID');
	      	if(ClasificacionPeriodo::all()->count())
	      		$Periodo=true;
	       return View::make('AsientosContables.create')
	       		->with('Motivos',$Motivos)
	       		->with('PeriodoContable',$Periodo)
	       		->with('UnidadMonetaria',$UM);
       	}else{
       		return Redirect::to('/403');
       	}
	}


	public function store()
	{
		if (Seguridad::CrearAsientosContable()) {
			$input = Input::all();
			$validation = Validator::make($input, LibroDiario::$rules);
			if ($validation->passes())
			{
				$LibroDiario= new LibroDiario;
				$input['CON_LibroDiario_FechaCreacion']= date('Y-m-d H:m:s');
				$input['CON_LibroDiario_FechaModificacion'] =date('Y-m-d H:m:s');
				$Unidad=UnidadMonetaria::find($input['CON_UnidadMonetaria_ID']);
				if($Unidad){
					$input['CON_LibroDiario_Monto']=$input['CON_LibroDiario_Monto']*$Unidad->CON_UnidadMonetaria_TasaConversion;
					$LibroDiario->create($input);
				}
				

				return Redirect::action('LibroDiarioController@index');
			}

			return Redirect::action('AsientosController@create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		}else{
			return Redirect::to('/403');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function cargarcuentas(){
		if (Seguridad::CrearAsientosContable()) {
			if(Request::ajax()){
				$CuentaMotivo= CuentaMotivo::where('CON_MotivoTransaccion_ID','=',Input::get('id'))->get();
				if ($CuentaMotivo[0]->CON_CuentaMotivo_DebeHaber!=1){
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
		}else{
			return Redirect::to('/403');
		}
	}

	public function crearmotivo(){
		if(Seguridad::AgregarMotivoAsientosManuales()){
			if(Request::ajax()){
				$habilitadas = CatalogoContable::where('CON_CatalogoContable_Estado','=',1)->get();
				$Cuentas  = $habilitadas->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
				return View::make('MotivoTransaccion.create')
				->with('Cuentas',$Cuentas);
			}
		}else{
			return Redirect::to('/403');
		}
	}

	public function creandomotivo(){
		if(Seguridad::AgregarMotivoAsientosManuales()){
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
		}else{
			return Redirect::to('/403');
		}
		
	}

}
