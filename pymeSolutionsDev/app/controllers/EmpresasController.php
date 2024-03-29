<?php

use Carbon\Carbon;

class EmpresasController extends BaseController {

	/**
	 * Empresa Repository
	 *
	 * @var Empresa
	 */
	protected $Empresa;

	public function __construct(Empresa $Empresa)
	{
		$this->Empresa = $Empresa;
	}

	public function buscar() {
		if (Seguridad::BuscarEmpresa()) {
 			#return Empresa::where('CRM_Empresas_Nombre', 'LIKE' ,'%' . Input::get('name') . '%')->get();
 			$val = '%'.Input::get('name').'%';
 			if ($val == "") {
 				return DB::table('CRM_Empresas')->get();
 			}
 			$result = DB::table('CRM_Empresas')->where('CRM_Empresas_Nombre','LIKE',$val)
 								->orWhere('CRM_Empresas_Direccion','LIKE',$val)
 								->orWhere('CRM_Empresas_Codigo','LIKE',$val)->lists('CRM_Empresas_ID');
 			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1);
 			if ($campos) {
 				$noListas = $campos->where('GEN_CampoLocal_Tipo','<>','LIST')->lists('GEN_CampoLocal_ID');
 				$listas = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1)->where('GEN_CampoLocal_Tipo','LIKE','%LIST%')->lists('GEN_CampoLocal_ID');
 				if ($listas) {
 					$valorLista = DB::table('GEN_CampoLocalLista')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->where('GEN_CampoLocalLista_Valor','LIKE',$val)->lists('GEN_CampoLocalLista_ID');
 					if($valorLista) {
 						$result = array_merge($result,DB::table('CRM_ValorCampoLocal')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->whereIn('CRM_ValorCampoLocal_Valor',$valorLista)->lists('CRM_Empresas_CRM_Empresas_ID'));
 					}
 				}
 				if ($noListas) {
 					$result = array_merge($result,DB::table('CRM_ValorCampoLocal')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$noListas)->where('CRM_ValorCampoLocal_Valor','LIKE',$val)->lists('CRM_Empresas_CRM_Empresas_ID'));
 				}
 			}
 			if ($result) {
 				return DB::table('CRM_Empresas')->whereIn('CRM_Empresas_ID',$result)->get();
 			} else {
 				return  0;
 			}	
 		} else {
 			return Redirect::to('/403');
 		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::VerEmpresa()) {
 			//$Empresas = $this->Empresa->all();
 			$Empresas = $this->Empresa->whereNull('CRM_Empresas_Eliminados')->paginate(3);

 			return View::make('Empresas.index', compact('Empresas'));	
 		} else {
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
		if (Seguridad::CrearEmpresa()) {
			return View::make('Empresas.create');
 		} else {
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
		if (Seguridad::CrearEmpresa()) {
			$input = Input::all();
			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_EP%')->get();
			$res = Empresa::$rules;

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

			$regex = 'Required|unique:CRM_Empresas|regex:/^';
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
			$res = array_merge($res,array('CRM_Empresas_Codigo' => $regex));

			$validation = Validator::make($input, $res);

			if ($validation->passes())
			{
				$empresaa = $this->Empresa->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_EP%')->lists('GEN_CampoLocal_Codigo')));
				$empresaa->CRM_Empresas_FechaCreacion = Carbon::now();
				$empresaa->CRM_Empresas_UsuarioModificacion = "admin";
				$empresaa->save();

				foreach ($campos as $campo) {
					DB::table('CRM_ValorCampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'CRM_Empresas_CRM_Empresas_ID' => $empresaa->CRM_Empresas_ID));
				}
				return Redirect::route('CRM.Empresas.index');
			}

			return Redirect::route('CRM.Empresas.create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
 		} else {
 			return Redirect::to('/403');
 		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Seguridad::VerEmpresa()) {
 			$Empresa = $this->Empresa->findOrFail($id);

 			return View::make('CRM.Empresas.show', compact('Empresa'));	
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
		if (Seguridad::EditarEmpresa()) {
 			$Empresa = $this->Empresa->find($id);

 			if (is_null($Empresa))
 			{
 				return Redirect::route('Empresas.index');
 			}

 			return View::make('Empresas.edit', compact('Empresa'));	
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
		if (Seguridad::EditarEmpresa()) {
 			$input = array_except(Input::all(), '_method');
 			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_EP%')->get();
 			$res = Empresa::$rules;

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
 			$toRegex = DB::table('CRM_TipoDocumento')->where('CRM_TipoDocumento_ID',DB::table('CRM_Empresas')->where('CRM_Empresas_ID',$id)->first()->CRM_TipoDocumento_CRM_TipoDocumento_ID)->first()->CRM_TipoDocumento_Validacion;
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
 			$res = array_merge($res,array('CRM_Empresas_Codigo' => $regex));

 			$validation = Validator::make($input, $res);

 			if ($validation->passes())
 			{
 				$Empresa = $this->Empresa->find($id);
 				$Empresa->update(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_EP%')->lists('GEN_CampoLocal_Codigo')));
 				$Empresa->CRM_Empresas_FechaModificacion = Carbon::now();
 				$Empresa->CRM_Empresas_UsuarioModificacion = "admin";
 				$Empresa->save();

 				foreach ($campos as $campo) {
 					if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->count() > 0 ) {
 					    DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->update(array('CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
 					} elseif (Input::has($campo->GEN_CampoLocal_Codigo)) {
 						DB::table('CRM_ValorCampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'CRM_ValorCampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'CRM_Empresas_CRM_Empresas_ID' => $Empresa->CRM_Empresas_ID));
 					}
 				}
 				return Redirect::route('CRM.Empresas.index', $id);
 			}

 			return Redirect::route('CRM.Empresas.edit', $id)
 				->withInput()
 				->withErrors($validation)
 				->with('message', 'There were validation errors.');	
 		} else {
 			return Redirect::to('/403');
 		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Seguridad::EliminarEmpresa()) {
 			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'CRM_EP%')->get();
 			$Empresa = $this->Empresa->find($id);
 			$Empresa->CRM_Empresas_Estado = 1;
 			$Empresa->CRM_Empresas_Eliminados = Carbon::now();

 			foreach ($campos as $campo) {
 				if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->count() > 0 ) {
 				    DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->delete();
 				}
 			}

 			$Empresa->save();

 			//$Empresa->delete();

 			return Redirect::route('CRM.Empresas.index');
 		} else {
 			return Redirect::to('/403');
 		}
	}

}
