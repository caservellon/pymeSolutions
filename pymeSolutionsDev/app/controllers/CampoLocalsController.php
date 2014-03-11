<?php

class CampoLocalsController extends BaseController {

	/**
	 * CampoLocal Repository
	 *
	 * @var CampoLocal
	 */
	protected $CampoLocal;

	public function __construct(CampoLocal $CampoLocal)
	{
		$this->CampoLocal = $CampoLocal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$CampoPersonas = $this->CampoLocal->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get();
		$CampoEmpresas = $this->CampoLocal->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP%')->get();
		$CampoLocal = $this->CampoLocal->all();
		return View::make('CampoLocals.index', array(
			'CampoPersonas' => $CampoPersonas,
			'CampoEmpresas' => $CampoEmpresas
			));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CampoLocals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = true;
		$Campo = new CampoLocal;
		$Campo->GEN_CampoLocal_Activo = Input::get('GEN_CampoLocal_Activo');
		$Campo->GEN_CampoLocal_Requerido = Input::get('GEN_CampoLocal_Requerido') == 1 ? 1 : 0;
		$Campo->GEN_CampoLocal_ParametroBusqueda = Input::get('GEN_CampoLocal_ParametroBusqueda') == 1 ? 1 : 0;
		$Campo->GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
		if (Input::get('GEN_CampoLocal_Nombre') == "") {
			$validation = false;
		} else {
			$Campo->GEN_CampoLocal_Nombre = Input::get("GEN_CampoLocal_Nombre");
			$Codigo = "CRM_" . Input::get('Tipo_de_Perfil') . "_" . $Campo->GEN_CampoLocal_Nombre;
			$Campo->GEN_CampoLocal_Codigo = $Codigo;
		}
		if ($validation)
		{
			$Campo->save();
			return Redirect::route('CampoLocals.index');
		}

		return Redirect::route('CampoLocals.create')
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
		$CampoLocal = $this->CampoLocal->findOrFail($id);

		return View::make('CampoLocals.show', compact('CampoLocal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$CampoLocal = $this->CampoLocal->find($id);

		if (is_null($CampoLocal))
		{
			return Redirect::route('CampoLocals.index');
		}
		$tipoDePerfil = strncmp($CampoLocal->GEN_CampoLocal_Codigo,'CRM_EP', 6) == 0? 'EP':'PS';
		
		return View::make('CampoLocals.edit', array('CampoLocal' => $CampoLocal, 'tipoDePerfil' => $tipoDePerfil));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		

		$validation = true;
		$Campo = new CampoLocal;
		$Campo->GEN_CampoLocal_Activo = Input::get('GEN_CampoLocal_Activo');
		$Campo->GEN_CampoLocal_Requerido = Input::get('GEN_CampoLocal_Requerido') == 1 ? 1 : 0;
		$Campo->GEN_CampoLocal_ParametroBusqueda = Input::get('GEN_CampoLocal_ParametroBusqueda') == 1 ? 1 : 0;
		$Campo->GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
		if (Input::get('GEN_CampoLocal_Nombre') == "") {
			$validation = false;
		} else {
			$Campo->GEN_CampoLocal_Nombre = Input::get("GEN_CampoLocal_Nombre");
			$Codigo = "CRM_" . Input::get('Tipo_de_Perfil') . "_" . $Campo->GEN_CampoLocal_Nombre;
			$Campo->GEN_CampoLocal_Codigo = $Codigo;
		}
		if ($validation)
		{
			$Campo->save();
			return Redirect::route('CampoLocals.show', $id);
		}

		return Redirect::route('CampoLocals.edit', $id)
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
		$this->CampoLocal->find($id)->delete();

		return Redirect::route('CampoLocals.index');
	}

}
