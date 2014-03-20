<?php

class ProveedorController extends BaseController {

	/**
	 * Proveedor Repository
	 *
	 * @var Proveedor
	 */
	protected $Proveedor;

	public function __construct(Proveedor $Proveedor)
	{
		$this->Proveedor = $Proveedor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Proveedor = $this->Proveedor->all();

		return View::make('Proveedor.index', compact('Proveedor'));
	}

	public function search_index(){

 		/*$Proveedor = Proveedor::where('INV_Proveedor_Nombre', '=', Input::get('search'))
		->orWhere('INV_Proveedor_Codigo', '=', Input::get('search'))
		->orWhere('INV_Proveedor_RepresentanteVentas', '=', Input::get('search'))	
		->get(); 

		if($Proveedor->count() == 0){	
 		$Proveedor = Proveedor::where('INV_Ciudad_ID', '=', Ciudad::where('INV_Ciudad_Nombre', '=', Input::get('search'))->firstOrFail()->INV_Ciudad_ID)->get();
		} 

		//$Proveedor = Proveedor::where('INV_Proveedor_ID', '=', DB::table('INV_Producto_Proveedor')->where('INV_Producto_ID', '=',  Producto::where('INV_Producto_Nombre', '=', Input::get('search'))->first()->INV_Producto_ID)->firstOrFail()->INV_Proveedor_ID)->get();

		return View::make('Proveedor.index', compact('Proveedor'));*/
		
//---------------------------------------------------------------------------------------------------------------
		$Proveedor = Proveedor::where('INV_Proveedor_Nombre', '=', Input::get('search'))
		->orWhere('INV_Proveedor_Codigo', '=', Input::get('search'))
		->orWhere('INV_Proveedor_RepresentanteVentas', '=', Input::get('search'))	
		->get();	

		$queryCiudad = DB::select('SELECT INV_Ciudad_ID FROM INV_Ciudad WHERE INV_Ciudad_Nombre = ?', array(Input::get('search')));
		$queryProducto = DB::select('SELECT INV_Proveedor_ID FROM INV_Producto_Proveedor WHERE INV_Producto_ID = (SELECT INV_Producto_ID FROM INV_Producto WHERE INV_Producto_Nombre = ?)', array(Input::get('search')));


		if(!empty($queryCiudad)){
			$temp = array();
			foreach ($queryCiudad as $qC) {
				array_push($temp, $qC->INV_Ciudad_ID);
			}
			$Proveedor = Proveedor::whereIn('INV_Ciudad_ID', $temp)->get();
		}

		if(!empty($queryProducto)){
			$temp = array();
			foreach ($queryProducto as $qP) {
				array_push($temp, $qP->INV_Proveedor_ID);
			}
			$Proveedor =  Proveedor::whereIn('INV_Proveedor_ID', $temp)->get();	
		}

		return View::make('Proveedor.index', compact('Proveedor'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = Ciudad::all()->lists('INV_Ciudad_Nombre', 'INV_Ciudad_ID');
		$productos = Producto::all()->lists('INV_Producto_Nombre','INV_Producto_ID');
		return View::make('Proveedor.create', compact('ciudades','productos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		$validation = Validator::make($input, Proveedor::$rules);
		if ($validation->passes())
		{
			$proveedorTemporal = $this->Proveedor->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->lists('GEN_CampoLocal_Codigo')));
			if($proveedorTemporal){
				$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->get();
 				foreach ($campos as $campo) {
 					$iniput =Input::get($campo->GEN_CampoLocal_Codigo);
 					if ($iniput) {
 						$valorCampo = new ProveedorCampoLocal;
 						$valorCampo->INV_Proveedor_CampoLocal_Valor = $iniput;
 						$valorCampo->INV_Proveedor_INV_Proveedor_ID = $proveedorTemporal->INV_Proveedor_ID;
 						$valorCampo->INV_Proveedor_INV_Ciudad_ID = $proveedorTemporal->INV_Ciudad_ID;
 						$valorCampo->GEN_CampoLocal_GEN_CampoLocal_ID = $campo->GEN_CampoLocal_ID;
 						$valorCampo->save();
 						//DB::table('INV_Producto_CampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'INV_Producto_CampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
 						//return Redirect::route('Empresas.index');
 					} elseif ($campo->GEN_CampoLocal_Requerido) {
 						return Redirect::route('Inventario.Proveedor.create')
 							->withInput()
 							->withErrors($validation)
 							->with('message', 'Algunos campos requeridos no han sido completados.');
 					}
 				}
			}

			$Proveedor = new Proveedor;
			$Proveedor->INV_Proveedor_Codigo = Input::get('INV_Proveedor_Codigo');
			$Proveedor->INV_Proveedor_Nombre = Input::get('INV_Proveedor_Nombre');
			$Proveedor->INV_Proveedor_Direccion = Input::get('INV_Proveedor_Direccion');
			$Proveedor->INV_Proveedor_Telefono = Input::get('INV_Proveedor_Telefono');
			$Proveedor->INV_Proveedor_Activo = Input::get('INV_Proveedor_Activo');
			$Proveedor->INV_Proveedor_Email = Input::get('INV_Proveedor_Email');
			$Proveedor->INV_Proveedor_PaginaWeb = Input::get('INV_Proveedor_PaginaWeb');
			$Proveedor->INV_Proveedor_RepresentanteVentas = Input::get('INV_Proveedor_RepresentanteVentas');
			$Proveedor->INV_Proveedor_TelefonoRepresentanteVentas = Input::get('INV_Proveedor_TelefonoRepresentanteVentas');
			$Proveedor->INV_Proveedor_Comentarios = Input::get('INV_Proveedor_Comentarios');
			$Proveedor->INV_Proveedor_RutaImagen = Input::get('INV_Proveedor_RutaImagen');
			$Proveedor->INV_Ciudad_ID = Input::get('INV_Ciudad_ID');
			$Proveedor->INV_Proveedor_FechaCreacion = date('Y-m-d H:i:s');
			$Proveedor->INV_Proveedor_FechaModificacion = date('Y-m-d H:i:s');
			$Proveedor->save();

			DB::table('INV_Producto_Proveedor')->insert(
    		array('INV_Producto_ID' => Input::get('INV_Producto_Nombre'),
    			   'INV_Proveedor_ID' => DB::table('INV_Proveedor')->count()
			));
			return Redirect::route('Inventario.Proveedor.index');
		}
		return Redirect::route('Inventario.Proveedor.create')
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
		$Proveedor = $this->Proveedor->findOrFail($id);

		return View::make('Proveedor.show', compact('Proveedor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Proveedor = $this->Proveedor->find($id);
		$ciudades = Ciudad::all()->lists('INV_Ciudad_Nombre', 'INV_Ciudad_ID');
		
		if (is_null($Proveedor))
		{
			return Redirect::route('Inventario.Proveedor.index', compact('ciudades'));
		}

		return View::make('Proveedor.edit', compact('Proveedor', 'ciudades'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_method');
		$validation = Validator::make($input, Proveedor::$rules);

		if ($validation->passes())
		{
			$Proveedor = $this->Proveedor->find($id);
			$Proveedor->INV_Proveedor_Activo = Input::get('INV_Proveedor_Activo');
			$Proveedor->update($input);

			return Redirect::route('Inventario.Proveedor.show', $id);
		}

		return Redirect::route('Inventario.Proveedor.edit', $id)
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
		$this->Proveedor->find($id)->delete();

		return Redirect::route('Inventario.Proveedor.index');
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
