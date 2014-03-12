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
	   $Motivos = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
       return View::make('AsientosContables.create')
       		->with('Motivos',$Motivos);
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
			return View::make('MotivoTransaccion.create');
		}
	}

	public function store()
	{
		//
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
        return View::make('Asientos.edit');
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
