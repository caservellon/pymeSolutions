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

	public function buscar() {
		$Personas = Persona::where('CRM_Personas_Nombres', 'LIKE' , '%' . Input::get('name') . '%')->get();
		return $Personas;
	}

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
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->get();
		$res = Persona::$rules;

		foreach ($campos as $campo) {
			$val = '';
			if ($campo->GEN_CampoLocal_Requerido) {
				$val = $val.'Required|';
			}
			switch ($campo->GEN_CampoLocal_Tipo) {
				case 'TXT':
					$val = $val.'alphanumdotspaces|';
					break;				
				case 'INT':
					$val = $val.'Integer|';
					break;
				case 'FLOAT':
					$val = $val.'Numeric|';
					break;				
				default:
					break;
			}
			$res = array_merge($res,array($campo->GEN_CampoLocal_Codigo => $val));
		}

		$validation = Validator::make($input, $res);

		if ($validation->passes())
		{
			
			$personaa = $this->Persona->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->lists('GEN_CampoLocal_Codigo')));
			foreach ($campos as $campo) {
				DB::table('CRM_ValorCampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'CRM_Personas_CRM_Personas_ID' => $personaa->CRM_Personas_ID));
			}
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
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->get();
		$res = Persona::$rules;

		foreach ($campos as $campo) {
			$val = '';
			if ($campo->GEN_CampoLocal_Requerido) {
				$val = $val.'Required|';
			}
			switch ($campo->GEN_CampoLocal_Tipo) {
				case 'TXT':
					$val = $val.'alphanumdotspaces|';
					break;				
				case 'INT':
					$val = $val.'Integer|';
					break;
				case 'FLOAT':
					$val = $val.'Numeric|';
					break;				
				default:
					break;
			}
			$res = array_merge($res,array($campo->GEN_CampoLocal_Codigo => $val));
		}

		$validation = Validator::make($input, $res);

		if ($validation->passes())
		{
			$Persona = $this->Persona->find($id);
			$Persona->update(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->lists('GEN_CampoLocal_Codigo')));
			foreach ($campos as $campo) {
				if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0 ) {
				    DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->update(array('CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
				} elseif (Input::has($campo->GEN_CampoLocal_Codigo)) {
					DB::table('CRM_ValorCampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'CRM_Personas_CRM_Personas_ID' => $Persona->CRM_Personas_ID));
				}
			}
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
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->get();
		$Persona = $this->Persona->find($id);

		if (DB::table('CRM_Empresas')->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0) {
			return Redirect::route('CRM.Empresas.index');
		}

		foreach ($campos as $campo) {
			if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0 ) {
			    DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->delete();
			}
		}

		$Persona->delete();

		return Redirect::route('CRM.Personas.index');
	}

}
