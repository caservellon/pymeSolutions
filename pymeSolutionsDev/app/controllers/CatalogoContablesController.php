<?php

class CatalogoContablesController extends BaseController {

	/**
	 * CatalogoContable Repository
	 *
	 * @var CatalogoContable
	 */
	protected $CatalogoContable;

	public function __construct(CatalogoContable $CatalogoContable)
	{
		$this->CatalogoContable = $CatalogoContable;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::ListarCatalogoContables()) {
		//Contabilidad::GenerarTransaccion(1,500);

		$Catalogo = $this->CatalogoContable	->orderby('CON_CatalogoContable_Codigo')
											->orderby('CON_CatalogoContable_CodigoSubcuenta')
											->get();
		$clasi = ClasificacionCuenta::all();

		return View::make('CatalogoContables.index',compact('clasi'))
			->with('Catalogo',$Catalogo)
			->with('CatalogoContable',$Catalogo)
			->with('clasi',$clasi);
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
		if (Seguridad::AgregarCuenta()) {
			$clasi = ClasificacionCuenta::all()->lists('CON_ClasificacionCuenta_Nombre','CON_ClasificacionCuenta_ID');
	    	$selected = array();
	    	$esta =array('1' => 'Activo','0' => 'Inactivo' );
	    	$selected2 = array();
	    	$naturaleza  = array('0' => 'Deudor','1' => 'Acreedor' );
	    	$selected3 = array();
	    	$codigos = array();
	    	
			return View::make('CatalogoContables.create',compact('clasi', 'selected','esta','selected2','naturaleza','selected3'));
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
		if (Seguridad::AgregarCuenta()) {
			$input = Input::all();
			$validation = Validator::make($input, CatalogoContable::$rules);

			if ($validation->passes())
			{
				$this->CatalogoContable->create($input);

				return Redirect::action('CatalogoContablesController@index');
			}

			return Redirect::action('CatalogoContablesController@create')
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
		if (Seguridad::EditarCuenta()) {
			$CatalogoContable = $this->CatalogoContable->find($id);

			if (is_null($CatalogoContable))
			{
				return Redirect::action('CatalogoContablesController@index');
			}
			$clasi = ClasificacionCuenta::all()->lists('CON_ClasificacionCuenta_Nombre','CON_ClasificacionCuenta_ID');
	    	$selected = array();
	    	$esta =array('1' => 'Activo','0' => 'Inactivo' );
	    	$selected2 = array();
	    	$naturaleza  = array('0' => 'Deudor','1' => 'Acreedor' );
	    	$selected3 = array();

			return View::make('CatalogoContables.edit', compact('CatalogoContable','clasi','selected','esta','selected2','naturaleza','selected3'));
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
		//	$id=$array['id'];
		if (Seguridad::EditarCuenta()) {
		
			$input = array_except(Input::all(), '_method');
			$validation = Validator::make($input, CatalogoContable::$rules);

			if ($validation->passes())
			{
				$CatalogoContable = $this->CatalogoContable->find($id);
				$CatalogoContable->update($input);

				//return Redirect::route('CatalogoContables.show', $id);
				return Redirect::action('CatalogoContablesController@index', $id);
			}
	
			
		

			return Redirect::action('CatalogoContablesController@edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		}else{
			return Redirect::to('/403');
		}
	}

// **********************************************************************
	public function cambiarestado($id,$estado)
	{
		//	$id=$array['id'];
		if($estado==0 || $estado==1){
			$CatalogoContable = $this->CatalogoContable->find($id);
			$CatalogoContable->CON_CatalogoContable_Estado=$estado;
			$CatalogoContable->update();
			
			$CatalogoContable = $this->CatalogoContable->find($id);
			$CatalogoContable->update($input);

				//return Redirect::route('CatalogoContables.show', $id);
				//return Redirect::action('CatalogoContablesController@index', $id);
			
		}
			
		

		/*return Redirect::action('CatalogoContablesController@edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');*/
	}


	public function destroy($id)
	{
		$input = array_except(Input::all(), '_method');
		

		
			$CatalogoContable = $this->CatalogoContable->find($id);
			$CatalogoContable->update($input);

			//return Redirect::route('CatalogoContables.show', $id);
			return Redirect::action('CatalogoContablesController@show', $id);
	
		/*return Redirect::action('CatalogoContablesController@edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');*/
	}

}
