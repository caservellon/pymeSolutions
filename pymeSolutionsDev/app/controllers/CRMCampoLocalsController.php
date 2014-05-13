<?php

class CRMCampoLocalsController extends BaseController {

	protected $CampoLocal;
	public function __construct(CampoLocal $CampoLocal)
	{
		$this->CampoLocal = $CampoLocal;
	}

	public function index(){
		$CampoPersonas = $this->CampoLocal->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get();
		$CampoEmpresas = $this->CampoLocal->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP%')->get();
		return View::make('CRMCampoLocals.index', array(
			'CampoPersonas' => $CampoPersonas,
			'CampoEmpresas' => $CampoEmpresas
			));
	}

	public function create()
	{
		return View::make('CRMCampoLocals.create');
	}

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
		if ($validation) {
			$index = 0;
			$count = CampoLocal::where("GEN_CampoLocal_Codigo", $Campo->GEN_CampoLocal_Codigo)->get()->count();
			while($count > 0){
				$index = $index + 1;
				$count = CampoLocal::where("GEN_CampoLocal_Codigo", $Campo->GEN_CampoLocal_Codigo . $index )->get()->count();
			}
			$Campo->GEN_CampoLocal_Codigo = $index == 0 ? $Campo->GEN_CampoLocal_Codigo: $Campo->GEN_CampoLocal_Codigo . $index;
			if($Campo->save()){
				if ($Campo->GEN_CampoLocal_Tipo == 'LIST') {
					$oneList = Input::get('value-list-array');
					$valueList = explode(";", $oneList);
					foreach ($valueList as $value ) {
						$ListItem = new CampoLocalLista;
						$ListItem->GEN_CampoLocalLista_Valor = $value;
						$ListItem->GEN_CampoLocal_GEN_CampoLocal_ID = $Campo->GEN_CampoLocal_ID;
						$ListItem->save();
					}

				}
			}
			return Redirect::route('CRM.CampoLocals.index');
		}

		return Redirect::route('CRM.CampoLocals.create')
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}


	public function show($id)
	{
		$CampoLocal = $this->CampoLocal->findOrFail($id);

		return View::make('CRMCampoLocals.show', compact('CampoLocal'));
	}

	public function edit($id)
	{
		$CampoLocal = $this->CampoLocal->find($id);

		if (is_null($CampoLocal))
		{
			return Redirect::route('CRM.CampoLocals.index');
		}
		$tipoDePerfil = strncmp($CampoLocal->GEN_CampoLocal_Codigo,'CRM_EP', 6) == 0? 'EP':'PS';
		$CampoLocalLista = null;
		$stringConcat = "";
		if ($CampoLocal->GEN_CampoLocal_Tipo == "LIST") {
			$CampoLocalLista = CampoLocalLista::where("GEN_CampoLocal_GEN_CampoLocal_ID", $CampoLocal->GEN_CampoLocal_ID)->get();
			foreach ($CampoLocalLista as $value) {
				$stringConcat = $stringConcat . $value->GEN_CampoLocalLista_Valor . ";";
			}

			$stringConcat = rtrim($stringConcat,";");
		}
		return View::make('CRMCampoLocals.edit', array('stringConcat'=> $stringConcat,'CampoLocal' => $CampoLocal, 'tipoDePerfil' => $tipoDePerfil, 'CampoLocalLista'=> $CampoLocalLista));
	}

	public function update($id){

		$validation = true;
		$Campo = CampoLocal::find($id);
		$Campo->GEN_CampoLocal_Activo = Input::get('GEN_CampoLocal_Activo');
		$Campo->GEN_CampoLocal_Requerido = Input::get('GEN_CampoLocal_Requerido') == 1 ? 1 : 0;
		$Campo->GEN_CampoLocal_ParametroBusqueda = Input::get('GEN_CampoLocal_ParametroBusqueda') == 1 ? 1 : 0;
		if($Campo->GEN_CampoLocal_Tipo != "LIST"){
			$Campo->GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
		}
		if (Input::get('GEN_CampoLocal_Nombre') == "") {
			$validation = false;
		} else {
			$Campo->GEN_CampoLocal_Nombre = Input::get("GEN_CampoLocal_Nombre");

		}
		if ($validation){
			if($Campo->save()){
				if ($Campo->GEN_CampoLocal_Tipo == 'LIST') {
					$oneList = Input::get('value-list-array');
					$valueList = explode(";", $oneList);
					$listado = CampoLocalLista::where('GEN_CampoLocal_GEN_CampoLocal_ID',$Campo->GEN_CampoLocal_ID)->get();
					foreach ($listado as $value) {
						$value->delete();
					}
					foreach ($valueList as $value ) {
						$ListItem = new CampoLocalLista;
						$ListItem->GEN_CampoLocalLista_Valor = $value;
						$ListItem->GEN_CampoLocal_GEN_CampoLocal_ID = $Campo->GEN_CampoLocal_ID;
						$ListItem->save();
					}
				}
			}
			return Redirect::route('CRM.CampoLocals.index');
		}

		return Redirect::route('CRM.CampoLocals.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function destroy($id)
	{
		$CampoLocal = CampoLocal::find($id);
		$CampoLocal->GEN_CampoLocal_Activo = 0;
		$CampoLocal->save();

		return Redirect::route('CRM.CampoLocals.index');
	}

}