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
		//Querys de las columnas propias de Proveedor
		$Proveedor = Proveedor::where('INV_Proveedor_Nombre', '=', Input::get('search')) 
		->orWhere('INV_Proveedor_Codigo', '=', Input::get('search'))
		->orWhere('INV_Proveedor_RepresentanteVentas', '=', Input::get('search'))	
		->get();	

		try {
			

			//Querys de las columnas que tiene relacion con la tabla Proveedor
			$queryCiudad = DB::select('SELECT INV_Ciudad_ID FROM INV_Ciudad WHERE INV_Ciudad_Nombre = ?', array(Input::get('search')));
			$queryProducto = DB::select('SELECT INV_Proveedor_ID FROM INV_Producto_Proveedor WHERE INV_Producto_ID = (SELECT INV_Producto_ID FROM INV_Producto WHERE INV_Producto_Nombre = ?)', array(Input::get('search')));
			$IDProveedor = DB::select('SELECT INV_Proveedor_INV_Proveedor_ID FROM INV_Proveedor_CampoLocal WHERE INV_Proveedor_CampoLocal_Valor = ?', array(Input::get('search'))); 
			$GENSID = DB::select('SELECT GEN_CampoLocal_GEN_CampoLocal_ID FROM INV_Proveedor_CampoLocal WHERE INV_Proveedor_CampoLocal_Valor = ?', array(Input::get('search')));
			
			//Se evalua si la Query trae algo
			if(!empty($queryCiudad)){
				$temp = array();
				//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
				foreach ($queryCiudad as $qC) {
					array_push($temp, $qC->INV_Ciudad_ID);
				}
				$Proveedor = Proveedor::whereIn('INV_Ciudad_ID', $temp)->get();
			}
			
			//Se evalua si la Query trae algo
			if(!empty($queryProducto)){
				$temp = array();
				//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
				foreach ($queryProducto as $qP) {
					array_push($temp, $qP->INV_Proveedor_ID);
				}
				$Proveedor =  Proveedor::whereIn('INV_Proveedor_ID', $temp)->get();	
			}

			if(!empty($GENSID)){ 

				$temp = array();
				foreach ($GENSID as $GENID){
					$PB = DB::select('SELECT GEN_CampoLocal_ParametroBusqueda FROM GEN_CampoLocal WHERE GEN_CampoLocal_ID = ?', array($GENID->GEN_CampoLocal_GEN_CampoLocal_ID)); 

					if($PB[0]->GEN_CampoLocal_ParametroBusqueda == 1){ 
	          	  		
	          	  		$ID = DB::select('SELECT INV_Proveedor_INV_Proveedor_ID FROM INV_Proveedor_CampoLocal WHERE GEN_CampoLocal_GEN_CampoLocal_ID = ?', array($GENID->GEN_CampoLocal_GEN_CampoLocal_ID));
						array_push($temp, $ID[0]->INV_Proveedor_INV_Proveedor_ID);
	            	} 	
				}
				$Proveedor =  Proveedor::whereIn('INV_Proveedor_ID', $temp)->get(); 
	        } 

			return View::make('Proveedor.index', compact('Proveedor'));
		} catch (Exception $e) {
			return View::make('Proveedor.index', compact('Proveedor'));
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = Ciudad::all()->lists('INV_Ciudad_Nombre', 'INV_Ciudad_ID');
		//$valores = CampoLocalLista::all()->lists('GEN_CampoLocalLista_Valor', 'GEN_CampoLocalLista_ID');
		$productos = Producto::all()->lists('INV_Producto_Nombre','INV_Producto_ID');
		$fpagos = FormaPago::all()->lists('INV_FormaPago_Nombre','INV_FormaPago_ID');
		return View::make('Proveedor.create', compact('ciudades','productos', 'fpagos'));
	}

	public function create2(){

		$productos = Producto::all()->lists('INV_Producto_Nombre','INV_Producto_Nombre');
		$proveedor = Proveedor::all()->lists('INV_Proveedor_Nombre', 'INV_Proveedor_Nombre');

		return View::make('Proveedor.p2p', compact('productos', 'proveedor'));
	}

	public function create3(){

		$fpagos = FormaPago::all()->lists('INV_FormaPago_Nombre','INV_FormaPago_Nombre');
		$proveedor = Proveedor::all()->lists('INV_Proveedor_Nombre', 'INV_Proveedor_Nombre');

		return View::make('Proveedor.f2p', compact('fpagos', 'proveedor'));
	}


	public function FDP(){
		if (Request::ajax()) {
			$input = Input::all();
			$Query = DB::table('INV_Proveedor_FormaPago')->where('INV_Proveedor_ID', Proveedor::where('INV_Proveedor_Nombre', $input['id'])->first()->INV_Proveedor_ID)->get();
			if(!empty($Query)) {
				$temp = array();
				foreach($Query as $Q){
					array_push($temp, $Q->INV_FormaPago_ID);
				}
				return $fpagos = FormaPago::whereNotIn('INV_FormaPago_ID',$temp)->get()->lists('INV_FormaPago_Nombre','INV_FormaPago_Nombre');
			} else {
				return $fpagos = FormaPago::all()->lists('INV_FormaPago_Nombre','INV_FormaPago_Nombre');
			}
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->get();
		$res = Proveedor::$rules;

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

			$prove = $this->Proveedor->create(Input::except(array_merge(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->lists('GEN_CampoLocal_Codigo'),array('INV_Producto_ID', 'INV_FormaPago_ID'))));
			foreach ($campos as $campo) {
				DB::table('INV_Proveedor_CampoLocal')->insertGetId(array('GEN_CampoLocal_GEN_CampoLocal_ID' => $campo->GEN_CampoLocal_ID,'INV_Proveedor_CampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo), 'INV_Proveedor_INV_Proveedor_ID' => $prove->INV_Proveedor_ID, 'INV_Proveedor_INV_Ciudad_ID' => $prove->INV_Ciudad_ID));
			}

			$proveedor = Proveedor::where('INV_Proveedor_Nombre', Input::get('INV_Proveedor_Nombre'))->get()->lists('INV_Proveedor_Nombre', 'INV_Proveedor_Nombre');
			$fpagos = FormaPago::all()->lists('INV_FormaPago_Nombre','INV_FormaPago_Nombre');
			return View::make('Proveedor.f2p', compact('fpagos', 'proveedor'));
			//return Redirect::route('Inventario.Proveedor.index');
		}

		return Redirect::route('Inventario.Proveedor.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');

	}

	public function editarFormaPago(){
		$proveedor = Proveedor::where('INV_Proveedor_Nombre', Input::get('INV_Proveedor_Nombre'))->get()->lists('INV_Proveedor_Nombre', 'INV_Proveedor_Nombre');
		$Query = DB::table('INV_Proveedor_FormaPago')->where('INV_Proveedor_ID', Proveedor::where('INV_Proveedor_Nombre', Input::get('INV_Proveedor_Nombre'))->first()->INV_Proveedor_ID)->get();
		$temp = array();
			foreach($Query as $Q){
				array_push($temp, $Q->INV_FormaPago_ID);
			}
		$fpagos = FormaPago::whereNotIn('INV_FormaPago_ID',$temp)->get()->lists('INV_FormaPago_Nombre','INV_FormaPago_Nombre');

		return View::make('Proveedor.f2p', compact('fpagos', 'proveedor'));
	}

	public function campolocalsave()
	{
		$nombreCampo = Input::get('nombre');
		$idProveedor = Input::get('codigoprod');
		$valorCampo = Input::get('valor');

		DB::table('INV_Proveedor_CampoLocal')
			->where('INV_Proveedor_INV_Proveedor_ID', $idProveedor)
			->update(array('INV_Proveedor_CampoLocal_Valor' => $valorCampo));

		return $valorCampo;
	}

	public function save()
	{
		$oneList = Input::get('value-list-array');
		$valueList = explode(";", $oneList);
		$PROVID = Proveedor::where('INV_Proveedor_Nombre', Input::get('INV_Proveedor_Nombre'))->first()->INV_Proveedor_ID;
		foreach ($valueList as $value ) {
			$PRODID = Producto::where('INV_Producto_Nombre', $value)->first()->INV_Producto_ID;
			DB::table('INV_Producto_Proveedor')->insert(array('INV_Proveedor_ID' => $PROVID, 'INV_Producto_ID' => $PRODID));
		}


		return Redirect::route('Inventario.Proveedor.index');
	}

	public function save2()
	{
		$oneList = Input::get('value-list-array');
		$valueList = explode(";", $oneList);
		$PROVID = Proveedor::where('INV_Proveedor_Nombre', Input::get('INV_Proveedor_Nombre'))->first()->INV_Proveedor_ID;
		foreach ($valueList as $value ) {
			$FPID = FormaPago::where('INV_FormaPago_Nombre', $value)->first()->INV_FormaPago_ID;
			DB::table('INV_Proveedor_FormaPago')->insert(array('INV_Proveedor_ID' => $PROVID, 'INV_FormaPago_ID' => $FPID));
		}


		return Redirect::route('Inventario.Proveedor.index');
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
		$productos = Producto::all()->lists('INV_Producto_Nombre','INV_Producto_ID');
		$fpagos = FormaPago::all()->lists('INV_FormaPago_Nombre','INV_FormaPago_ID');
		
		if (is_null($Proveedor))
		{
			return Redirect::route('Inventario.Proveedor.index', compact('ciudades'));
		}

		return View::make('Proveedor.edit', compact('Proveedor', 'ciudades', 'productos', 'fpagos'));
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
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->get();
		$res = Proveedor::$rules;

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
			$Proveedor = $this->Proveedor->find($id);
			$Proveedor->update(Input::except(array_merge(DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'INV_PRV%')->lists('GEN_CampoLocal_Codigo'),array('INV_Producto_ID', 'INV_FormaPago_ID'))));
			foreach ($campos as $campo) {
				if (DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->count() > 0 ) {
				    DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->update(array('INV_Proveedor_CampoLocal_Valor' => Input::get($campo->GEN_CampoLocal_Codigo)));
				}
			}
			DB::table('INV_Producto_Proveedor')->update(array('INV_Producto_ID' => Input::get('INV_Producto_ID'), 'INV_Proveedor_ID' => $Proveedor->INV_Proveedor_ID));
			DB::table('INV_Proveedor_FormaPago')->update(array('INV_FormaPago_ID' => Input::get('INV_FormaPago_ID'), 'INV_Proveedor_ID' => $Proveedor->INV_Proveedor_ID));
			return Redirect::route('Inventario.Proveedor.index', $id);
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
		$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'LIKE', 'INV_PRV%')->get();
 		$Proveedor = $this->Proveedor->find($id);
 
 		foreach ($campos as $campo) {
 			if (DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->count() > 0 ) {
 			    DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->delete();
 			}
 		}
 
 		$Proveedor->delete();

		return Redirect::route('Inventario.Proveedor.index');
	}

	public function returnUser()
	{
		
		return 'usuario';
	}

}
