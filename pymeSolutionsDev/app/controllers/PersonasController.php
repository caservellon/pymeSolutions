<?php

class PersonasController extends BaseController {

	/**
	 * Persona Repository
	 *
	 * @var Persona
	 */
	protected $Persona;

	public function __construct(Persona $Persona)
	{
		$this->Persona = $Persona;
	}

	public function buscar()
	{
		return Persona::where('CRM_Personas_Nombres', 'LIKE' ,'%' . Input::get('name') . '%')->get();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Personas = $this->Persona->all();

		return View::make('Personas.index', compact('Personas'));
	}

	public function create() {
		$tipoDocumento = TipoDocumento::all();
		
		return View::make('Personas.create', compact('tipoDocumento'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$input = Input::all();
		$validation = Validator::make($input, Persona::$rules);

		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->get();

		foreach ($campos as $campo) {
			if (Input::get($campo->GEN_CampoLocal_Codigo)) {
				DB::table('CRM_ValorCampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
				//return Redirect::route('Empresas.index');
			} elseif ($campo->GEN_CampoLocal_Requerido) {
				return Redirect::route('CRM.Personas.create')
					->withInput()
					->withErrors($validation)
					->with('message', 'Algunos campos requeridos no han sido completados.');
			}
		}

		if ($validation->passes())
		{
			
			$this->Persona->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->lists('GEN_CampoLocal_Codigo')));

			return Redirect::route('CRM.Personas.index');
		}

		return Redirect::route('CRM.Personas.create')
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
		$Persona = $this->Persona->findOrFail($id);

		return View::make('CRM.Personas.show', compact('Persona'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Persona = $this->Persona->find($id);

		if (is_null($Persona))
		{
			return Redirect::route('CRM.Personas.index');
		}

		return View::make('Personas.edit', compact('Persona'));
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
		$validation = Validator::make($input, Persona::$rules);

		if ($validation->passes())
		{
			$Persona = $this->Persona->find($id);
			$Persona->update($input);

			return Redirect::route('CRM.Personas.index', $id);
		}

		return Redirect::route('CRM.Personas.edit', $id)
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
		$this->Persona->find($id)->delete();

		return Redirect::route('CRM.Personas.index');
	}

}
