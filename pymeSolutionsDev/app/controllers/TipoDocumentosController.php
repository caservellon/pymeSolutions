<?php

class TipoDocumentosController extends BaseController {

	protected $TipoDocumento;

	public function __construct(TipoDocumento $TipoDocumento)
	{
		$this->TipoDocumento = $TipoDocumento;
	}

	public function index()
	{
		$TipoDocumentos = $this->TipoDocumento->all();

		return View::make('TipoDocumentos.index', compact('TipoDocumentos'));
	}

	
	public function create()
	{
		return View::make('TipoDocumentos.create');
	}

	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, TipoDocumento::$rules);
		
		
		if ($validation->passes())
		{
			//$pattern = '/[X\/_\-\.L]*/';
			//$validationString = $input['CRM_TipoDocumento_Validacion'];
			$this->TipoDocumento->create($input);
			return Redirect::route('CRM.TipoDocumentos.index');
			
		}

		return Redirect::route('CRM.TipoDocumentos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function show($id)
	{
		$TipoDocumento = $this->TipoDocumento->findOrFail($id);

		return View::make('TipoDocumentos.show', compact('TipoDocumento'));
	}

	public function edit($id)
	{
		$TipoDocumento = $this->TipoDocumento->find($id);

		if (is_null($TipoDocumento)){
			return Redirect::route('CRM.TipoDocumentos.index');
		}
		return View::make('TipoDocumentos.edit', compact('TipoDocumento'));
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
		$validation = Validator::make($input, TipoDocumento::$rules);

		if ($validation->passes())
		{
			//$pattern = '/[X\/_\-\.L]*/';
			//$validationString = $input['CRM_TipoDocumento_Validacion'];
			//if(preg_match_all($pattern, $validationString) == 2){
			$TipoDocumento = $this->TipoDocumento->find($id);
			$TipoDocumento->update($input);
			return Redirect::route('CRM.TipoDocumentos.index');
			//}

		}

		return Redirect::route('CRM.TipoDocumentos.edit', $id)
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
		$doc = $this->TipoDocumento->find($id);

		if ($doc->CRM_TipoDocumento_Eliminado == true) {
			$doc->CRM_TipoDocumento_Eliminado = false;
		} else {
			$doc->CRM_TipoDocumento_Eliminado = true;
		}

		$doc->save();

		return Redirect::route('CRM.TipoDocumentos.index');
	}

}
