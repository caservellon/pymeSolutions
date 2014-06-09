<?php

//CAMPO LOCALS CONTROLER DE INVENTARIO
//COPY PASTE DESCARADO DEL DE CRM


class CampoLocalsController extends BaseController {

	protected $CampoLocal;
	public function __construct(CampoLocal $CampoLocal)
	{
		$this->CampoLocal = $CampoLocal;
	}

	public function index()
	{
		if (Seguridad::listarCampoLocal()) {
			$CampoPersonas = $this->CampoLocal->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRD%')->get();
			$CampoEmpresas = $this->CampoLocal->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRV%')->get();
			return View::make('CampoLocals.index', array('CampoPersonas' => $CampoPersonas,'CampoEmpresas' => $CampoEmpresas));
		} else {
			return Redirect::to('/403');
		}
	}

	public function create()
	{
		if (Seguridad::crearCampoLocal()) {
			return View::make('CampoLocals.create');
		} else {
			return Redirect::to('/403');
		}
	}

	public function store()
	{


		if (Seguridad::crearCampoLocal()) {
			$validation = true;
			$Campo = new CampoLocal;
			$Campo->GEN_CampoLocal_Activo = 1;
			$Campo->GEN_CampoLocal_Requerido = Input::get('GEN_CampoLocal_Requerido') == 1 ? 1 : 0;
			$Campo->GEN_CampoLocal_ParametroBusqueda = Input::get('GEN_CampoLocal_ParametroBusqueda') == 1 ? 1 : 0;
			$Campo->GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
			if (Input::get('GEN_CampoLocal_Nombre') == "") {
				$validation = false;
			} else {
				$Campo->GEN_CampoLocal_Nombre = Input::get("GEN_CampoLocal_Nombre");
				$Codigo = "INV_" . Input::get('Tipo_de_Perfil') . "_" . $Campo->GEN_CampoLocal_Nombre;
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
				return Redirect::route('Inventario.CampoLocals.index');
			}

		return Redirect::route('Inventario.CampoLocals.create')
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
		}


		
	}


	public function show($id)
	{
		$CampoLocal = $this->CampoLocal->findOrFail($id);

		return View::make('CampoLocals.show', compact('CampoLocal'));
	}

	public function edit($id)
	{


		if (Seguridad::editarCampoLocal()) {
			$CampoLocal = $this->CampoLocal->find($id);

			if (is_null($CampoLocal))
			{
				return Redirect::route('Inventario.CampoLocals.index');
			}
			$tipoDePerfil = strncmp($CampoLocal->GEN_CampoLocal_Codigo,'INV_PRD', 6) == 0? 'PRD':'PRV';
			$CampoLocalLista = null;
			$stringConcat = "";
			if ($CampoLocal->GEN_CampoLocal_Tipo == "LIST") {
				$CampoLocalLista = CampoLocalLista::where("GEN_CampoLocal_GEN_CampoLocal_ID", $CampoLocal->GEN_CampoLocal_ID)->get();
				foreach ($CampoLocalLista as $value) {
					$stringConcat = $stringConcat . $value->GEN_CampoLocalLista_Valor . ";";
				}

				$stringConcat = rtrim($stringConcat,";");
			}
			return View::make('CampoLocals.edit', array('stringConcat'=> $stringConcat,'CampoLocal' => $CampoLocal, 'tipoDePerfil' => $tipoDePerfil, 'CampoLocalLista'=> $CampoLocalLista));
			} else {
				return Redirect::to('/403');
			}
	}

	public function update($id){


		if (Seguridad::editarCampoLocal()) {
			$validation = true;
			$Campo = CampoLocal::find($id);
			$Campo->GEN_CampoLocal_Activo = true;
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
			return Redirect::route('Inventario.CampoLocals.index');
		}

		return Redirect::route('Inventario.CampoLocals.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
		}
	}

	public function destroy($id)
	{

		if (Seguridad::eliminarCampoLocal()) {
			$CampoLocal = CampoLocal::find($id);
			$CampoLocal->GEN_CampoLocal_Activo = 0;
			$CampoLocal->save();
		return Redirect::route('Inventario.CampoLocals.index');
		} else {
			return Redirect::to('/403');
		}
	}

}