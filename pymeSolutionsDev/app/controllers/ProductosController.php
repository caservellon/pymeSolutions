<?php

class ProductosController extends BaseController {

	/**
	 * Producto Repository
	 *
	 * @var Producto
	 */
	protected $Producto;

	public function __construct(Producto $Producto)
	{
		$this->Producto = $Producto;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::listarProducto()) {
			$Productos = $this->Producto->all();
			return View::make('Productos.index', compact('Productos'));
		} else {
			return Redirect::to('/403');
		}
	}

	public function index2()
	{
		if (Seguridad::ListarHistorial()) {
			$Productos = $this->Producto->all();
			return View::make('Productos.historial', compact('Productos'));
		} else {
			return Redirect::to('/403');
		}
	}
	
	public function create()
	{

		if (Seguridad::crearProducto()) {
			$tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
	      	$combobox = $tipos;
	      	$padres = DB::table('INV_Categoria')->lists('INV_Categoria_ID', 'INV_Categoria_Nombre');
	      	$hijos = DB::table('INV_Categoria')->lists('INV_Categoria_IDCategoriaPadre', 'INV_Categoria_Nombre');
	      	$jpadres = json_encode($padres);
	      	$jhijos = json_encode($hijos);
	      	//$results = DB::select('select * from users where id = ?', array(1));
	      	$idPadre = Input::get('INV_Categoria_IDCategoriaPadre');
	      	//$query = DB::table('INV_Categoria')->where('INV_Categoria_IDCategoriaPadre', '3')->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
	      	//$combobox2 = $query;
	      	$unidad = UnidadMedida::all()->lists('INV_UnidadMedida_Nombre', 'INV_UnidadMedida_ID');
	      	$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
			return View::make('Productos.create', compact('combobox', 'horarios', 'unidad', 'jpadres' ,'jhijos'));
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
		if (Seguridad::crearProducto()) {
			$input = Input::all();
			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRD%')->get();
			$res = Producto::$rules;
			foreach ($campos as $campo) {
				$val = '';
				if ($campo->GEN_CampoLocal_Requerido) {
					$val = $val.'Required|';
				}
				switch ($campo->GEN_CampoLocal_Tipo) {
					case 'TXT':
						$val = $val.'alpha_spaces|';
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
				$produ = $this->Producto->create(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRD%')->lists('GEN_CampoLocal_Codigo')));
				foreach ($campos as $campo) {
					DB::table('INV_Producto_CampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'INV_Producto_CampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'INV_Producto_ID' => $produ->INV_Producto_ID));
				}
				return Redirect::route('Inventario.Productos.index');
			}
			return Redirect::route('Inventario.Productos.create')
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
		if (Seguridad::listarProducto()) {
			$Producto = $this->Producto->findOrFail($id);
			return View::make('Productos.show', compact('Producto'));
		} else {
			return Redirect::to('/403');
		}
	}

	public function search_index()
	{
		try{
			$Productos = Producto::where('INV_Producto_Nombre', 'like', '%'.Input::get('search').'%') ->get();
			return View::make('Productos.index', compact('Productos'));
		}catch(Exception $e){
			return View::make('Productos.index', compact('Productos'));
		}
	}

	public function search_index2(){

		try{
			
			$Productos = Producto::where('INV_Producto_Nombre', 'like', '%'.Input::get('search').'%') ->get();
			return View::make('Productos.historial', compact('Productos'));

		}catch(Exception $e){
			return View::make('Productos.historial', compact('Productos'));
		}
	}

	public function campolocalsave()
	{
		$nombreCampo = Input::get('nombre');
		$idProducto = Input::get('codigoprod');
		$valorCampo = Input::get('valor');

		DB::table('INV_Producto_CampoLocal')
			->where('INV_Producto_ID', $idProducto)
			->update(array('INV_Producto_CampoLocal_Valor' => $valorCampo));

		return $valorCampo;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		if (Seguridad::editarProducto()) {
			$Producto = $this->Producto->find($id);
			$tipos = Categoria::all()->lists('INV_Categoria_Nombre', 'INV_Categoria_ID');
	      	$combobox = $tipos;
	      	$unidad = UnidadMedida::all()->lists('INV_UnidadMedida_Nombre', 'INV_UnidadMedida_ID');
	      	$horarios = Horario::all()->lists('INV_Horario_Nombre', 'INV_Horario_ID');
			if (is_null($Producto))
			{
				return Redirect::route('Inventario.Productos.index', compact('combobox', 'horarios', 'unidad'));
			}
			return View::make('Productos.edit', compact('Producto', 'combobox', 'horarios', 'unidad'));
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

		if (Seguridad::editarProducto()) {
			$input = array_except(Input::all(), '_method');
			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRD%')->get();
			$res = Producto::$rules;
			foreach ($campos as $campo) {
				$val = '';
				if ($campo->GEN_CampoLocal_Requerido) {
					$val = $val.'Required|';
				}
				switch ($campo->GEN_CampoLocal_Tipo) {
					case 'TXT':
						$val = $val.'alpha_spaces|';
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
				$Producto = $this->Producto->find($id);
				$Producto->update(Input::except(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRD%')->lists('GEN_CampoLocal_Codigo')));
				foreach ($campos as $campo) {
					if (DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->count() > 0 ) {
					    DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->update(array('INV_Producto_CampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
					}
				}
				return Redirect::route('Inventario.Productos.index', $id);
			}
			return Redirect::route('Inventario.Productos.edit', $id)
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
		
		if (Seguridad::eliminarProducto()) {
			$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'LIKE', 'INV_PRD%')->get();
	 		$Producto = $this->Producto->find($id);
	 		foreach ($campos as $campo) {
	 			if (DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->count() > 0 ) {
	 			    DB::table('INV_Producto_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Producto_ID',$Producto->INV_Producto_ID)->delete();
	 			}
	 		}
	 		$Producto->delete();
			return Redirect::route('Inventario.Productos.index');
		} else {
			return Redirect::to('/403');
		}
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

	public function search()
	{
		$input = Input::get("searchTerm");
		$query = DB::select('select INV_Producto_ValorCodigoBarras, INV_Producto_Nombre, INV_Producto_PrecioVenta FROM INV_Producto');
		$result = $query;
		return $result;
	}

	public function save()
	{
		$oneList = Input::get('value-list-array');
		$valueList = explode(";", $oneList);
		$PRODID = Producto::where('INV_Producto_Nombre', Input::get('INV_Producto_Nombre'))->first()->INV_Producto_ID;
		foreach ($valueList as $value ) {
			$PROVID = Proveedor::where('INV_Proveedor_Nombre', $value)->first()->INV_Proveedor_ID;
			DB::table('INV_Producto_Proveedor')->insert(array('INV_Proveedor_ID' => $PROVID, 'INV_Producto_ID' => $PRODID));
		}
	return View::make('Productos/p2p');
	}

}
