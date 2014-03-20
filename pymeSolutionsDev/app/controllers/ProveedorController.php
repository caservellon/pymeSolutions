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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = Ciudad::all()->lists('INV_Ciudad_Nombre', 'INV_Ciudad_ID');
		return View::make('Proveedor.create', compact('ciudades'));
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
