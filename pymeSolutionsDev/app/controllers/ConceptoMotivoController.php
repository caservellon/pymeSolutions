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

		if (Seguridad::ListarConceptosDeTransaccionesAutomaticas()) {
			$conceptos = ConceptoMotivo::all();
			$Motiv     = MotivoTransaccion::all();
	        return View::make('ConceptoMotivo.index')
	        -> with('ConceptoMotivos',$conceptos)
	        -> with('Moti',$Motiv);
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

		if (Seguridad::EditarConceptosDeTransaccionesAutomaticas()) {
			$CM = $this->ConceptoMotivo->find($id);
	        $MT = MotivoTransaccion::all()->lists('CON_MotivoTransaccion_Descripcion','CON_MotivoTransaccion_ID');
	        //return $MT;
			if (is_null($CM))
			{
				return Redirect::action('ConceptoMotivoController@index');
			}
	        return View::make('ConceptoMotivo.edit')
	        	->with('ConceptoMotivos',$CM)
	        	->with('ListaMotivos',$MT);
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

		if (Seguridad::EditarConceptosDeTransaccionesAutomaticas()) {
			$input = array_except(Input::all(), '_method');
			$Concepto = ConceptoMotivo::findOrFail($id);
			$var = $Concepto->CON_ConceptoMotivo_Concepto;
			$rules=str_replace(":Concepto", $var, ConceptoMotivo::$rules);
			//return $rules;
			$validation = Validator::make($input, $rules);
			if ($validation->passes())
			{
				$Concepto->update($input);

				return Redirect::action('ConceptoMotivoController@index');
			}
			return Redirect::action('ConceptoMotivoController@edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');//
			} else {
				return Redirect::to('/403');
			}
	}

}
