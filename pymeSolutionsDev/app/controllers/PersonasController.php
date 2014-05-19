<?php

use Carbon\Carbon;

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
		$val = '%'.Input::get('name').'%';
		$result = DB::table('CRM_Personas')->where('CRM_Personas_Nombres','LIKE',$val)
							->orWhere('CRM_Personas_Apellidos','LIKE',$val)
							->orWhere('CRM_Personas_Direccion','LIKE',$val)
							->orWhere('CRM_Personas_Email','LIKE',$val)
							->orWhere('CRM_Personas_Celular','LIKE',$val)
							->orWhere('CRM_Personas_Fijo','LIKE',$val)
							->orWhere('CRM_Personas_codigo','LIKE',$val)->lists('CRM_Personas_ID');
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1);
		if ($campos) {
			$noListas = $campos->where('GEN_CampoLocal_Tipo','<>','LIST')->lists('GEN_CampoLocal_ID');
			$listas = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1)->where('GEN_CampoLocal_Tipo','LIKE','%LIST%')->lists('GEN_CampoLocal_ID');
			if ($listas) {
				$valorLista = DB::table('GEN_CampoLocalLista')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->where('GEN_CampoLocalLista_Valor','LIKE',$val)->lists('GEN_CampoLocalLista_ID');
				if($valorLista) {
					$result = array_merge($result,DB::table('CRM_ValorCampoLocal')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->whereIn('CRM_ValorCampoLocal_Valor',$valorLista)->lists('CRM_Personas_CRM_Personas_ID'));
				}
			}
			if ($noListas) {
				$result = array_merge($result,DB::table('CRM_ValorCampoLocal')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$noListas)->where('CRM_ValorCampoLocal_Valor','LIKE',$val)->lists('CRM_Personas_CRM_Personas_ID'));
			}
		}
		if ($result) {
			return DB::table('CRM_Personas')->whereIn('CRM_Personas_ID',$result)->get();
		} else {
			return  0;
		}
	}

	public function index()
	{
		//$Personas = $this->Persona->all();
		$Personas = $this->Persona->whereNull('CRM_Personas_Eliminado')->get();

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

		$regex = 'Required|unique:CRM_Personas|regex:/^';
		$toRegex = DB::table('CRM_TipoDocumento')->where('CRM_TipoDocumento_ID',Input::get('CRM_TipoDocumento_CRM_TipoDocumento_ID'))->first()->CRM_TipoDocumento_Validacion;
		for ($i=0; $i < strlen($toRegex) ; $i++) { 
			if ($toRegex[$i] == '#') {
				$regex = $regex.'[0-9]';
			} elseif ( $toRegex[$i] == 'L') {
				$regex = $regex.'[a-zA-Z]';
			} elseif ($toRegex[$i] == '/' || $toRegex[$i] == '_' || $toRegex[$i] == '-' || $toRegex[$i] == '.') {
				$regex = $regex.'\\'.$toRegex[$i];
			}
		}
		$regex = $regex.'$/';
		$res = array_merge($res,array('CRM_Personas_codigo' => $regex));

		$validation = Validator::make($input, $res);

		if ($validation->passes())
		{
			$personaa = $this->Persona->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->lists('GEN_CampoLocal_Codigo')));
			$personaa->CRM_Personas_FechaCreacion = Carbon::now();
			$personaa->CRM_Personas_UsuarioModificacion = "admin";
			$personaa->save();

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

		$regex = 'regex:/^';
		$toRegex = DB::table('CRM_TipoDocumento')->where('CRM_TipoDocumento_ID',DB::table('CRM_Personas')->where('CRM_Personas_ID',$id)->first()->CRM_TipoDocumento_CRM_TipoDocumento_ID)->first()->CRM_TipoDocumento_Validacion;
		for ($i=0; $i < strlen($toRegex) ; $i++) { 
			if ($toRegex[$i] == '#') {
				$regex = $regex.'[0-9]';
			} elseif ( $toRegex[$i] == 'L') {
				$regex = $regex.'[a-zA-Z]';
			} elseif ($toRegex[$i] == '/' || $toRegex[$i] == '_' || $toRegex[$i] == '-' || $toRegex[$i] == '.') {
				$regex = $regex.'\\'.$toRegex[$i];
			}
		}
		$regex = $regex.'$/';
		$res = array_merge($res,array('CRM_Personas_codigo' => $regex));

		$validation = Validator::make($input, $res);

		if ($validation->passes())
		{
			$Persona = $this->Persona->find($id);
			$Persona->update(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_PS%')->lists('GEN_CampoLocal_Codigo')));
			$Persona->CRM_Personas_FechaModificacion = Carbon::now();
			$Persona->CRM_Personas_UsuarioModificacion = "admin";
			$Persona->save();

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
		$Persona->CRM_Personas_Estado = 1;
		$Persona->CRM_Personas_Eliminado = Carbon::now();

		if (DB::table('CRM_Empresas')->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0) {
			return Redirect::route('CRM.Empresas.index');
		}

		foreach ($campos as $campo) {
			if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0 ) {
			    DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->delete();
			}
		}

		$Persona->save();
		
		//$Persona->delete();

		return Redirect::route('CRM.Personas.index');
	}

}
