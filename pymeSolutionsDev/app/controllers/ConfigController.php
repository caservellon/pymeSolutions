<?php

class ConfigController extends BaseController {

	protected $Config;
	public function __construct(Configuracion $Config)
	{
		$this->Config = $Config;
	}

	public function index(){
		//if(Seguridad::indexCampoLocal()){
		$Config=Configuracion::all();
		return View::make('Config.index', array('Config'=>$Config
			));
		//}else {
            //return Redirect::to('/403');
        //}
	}

	public function create()

	{
		
        
	}

	public function store()
	{
		
	}


	public function show($id)
	{
		$Config = $this->Config->findOrFail($id);

		return View::make('Auth.Configuracion.show', compact('Config'));
	}

	public function edit($id)
	{
		
		$Config = $this->Config->find($id);

		if (is_null($Config))
		{
			return Redirect::route('Inventario.Configuracion.index');
		}

		return View::make('Config.edit', compact('Config'));
	}

	public function update($id){
		$input = Input::except('_method');
		$validation = Validator::make($input, Configuracion::$rules);

		if ($validation->passes())
		{
			$Config = $this->Config->find($id);
			
			$Config->SEG_Config_NombreEmpresa = Input::get('SEG_Config_NombreEmpresa');
			$Config->SEG_Config_Direccion = Input::get('SEG_Config_Direccion');
			$Config->SEG_Config_Telefono = Input::get('SEG_Config_Telefono');
			$Config->SEG_Config_Telefono2 = Input::get('SEG_Config_Telefono2');
			$Config->SEG_Config_Telefono2 = Input::get('SEG_Config_Telefono2');
			$Config->SEG_Config_Dominio = Input::get('SEG_Config_Dominio');
			$Config->SEG_Config_EmailContacto = Input::get('SEG_Config_EmailContacto');
			$Config->SEG_Config_EmailCompras = Input::get('SEG_Config_EmailCompras');
			$Config->SEG_Config_EmailVentas = Input::get('SEG_Config_EmailVentas');
			$Config->SEG_Config_Descripcion = Input::get('SEG_Config_Descripcion');
			//$Config->SEG_Config_Imagen = Input::get('SEG_Config_Imagen');
			$Config->SEG_Config_FechaModificacion = date('Y-m-d H:i:s');
			$Config->update();

			return Redirect::route('Auth.Configuracion.index');
		}

		return Redirect::route('Auth.Configuracion.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function destroy($id)
	{
		if(Seguridad::destroyCampoLocal()){
		$CampoLocal = CampoLocal::find($id);
		$CampoLocal->GEN_CampoLocal_Activo = 0;
		$CampoLocal->save();

		return Redirect::route('Compras.Configuracion.CampoLocal.index');
		}else {
            return Redirect::to('/403');
        }
	}

}