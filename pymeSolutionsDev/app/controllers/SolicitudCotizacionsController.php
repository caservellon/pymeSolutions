<?php



class SolicitudCotizacionsController extends BaseController {

	/**
	 * SolicitudCotizacion Repository
	 *
	 * @var SolicitudCotizacion
	 */
	protected $SolicitudCotizacion;

	public function __construct(SolicitudCotizacion $SolicitudCotizacion)
	{
		$this->SolicitudCotizacion = $SolicitudCotizacion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$SolicitudCotizacions = SolicitudCotizacion::paginate();
                $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
                
		return View::make('SolicitudCotizacions.index', compact('SolicitudCotizacions','CamposLocales'));
	}
        
        public function vistacrear(){
            $cualquierProducto = Producto::where('INV_Producto_Activo', '=', 1)->get();
            return View::make('SolicitudCotizacions.cualquierProducto', compact('cualquierProducto'));
        }
        
        public function vistaReorden(){
            $reOrden = Producto::where('INV_Producto_Activo', '=', 1)->get();
            return View::make('SolicitudCotizacions.reOrden', compact('reOrden'));
        }
        
        public function mostrarProveedor(){
            
            $cualquierProducto=array();
            
                for ($i = 1; $i <=count(Input::all()); $i++) {
                    if (Input::get('Incluir'.$i)==1){
                        $cualquierProducto[] = Input::get('id'.$i);
                    }
                }
                $proveedor=array();
                for($i=0; $i < count($cualquierProducto); $i++){
                    $prov_prod = DB::table('INV_Producto_Proveedor')->get();
                    foreach($prov_prod as $key){
                        if($cualquierProducto[$i] == $key->INV_Producto_ID){
                            $proveedor[]= $key->INV_Proveedor_ID;
                        }
                    
                    }
                }
                
            return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor'));
        }

        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('SolicitudCotizacions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                $input = Input::all();
		$proveedor=Input::get('prove');
                $prodfinal= array_unique($proveedor);
                $prod= array_values($prodfinal);
                $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_SC%')->get();
		$res = SolicitudCotizacion::$rules;

                $cualquierProducto=Input::get('cualquiera');
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

		if($validation->passes()){
                for($i=0; $i < count($prod); $i++){
                    $email=array();
                    $cont = SolicitudCotizacion::all();
                    $detalle=$cont->count()+1;
                    $solicitudCotizacion = new SolicitudCotizacion();
                    
                    $solicitudCotizacion->COM_SolicitudCotizacion_Codigo='COM_SC_'.$detalle;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaEmision= date('Y-m-d');
                    $solicitudCotizacion->COM_SolicitudCotizacion_DireccionEntrega= 'Los Llanos';
                    $solicitudCotizacion->COM_SolicitudCotizacion_Recibido=0;
                    $solicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaCreacion= date('Y-m-d');
                    $solicitudCotizacion->COM_Usuario_idUsuarioCreo=1;
                    $solicitudCotizacion->Proveedor_idProveedor=$prod[$i];
                    $solicitudCotizacion->save();
                    foreach($campos as $campo){
                        $valorcampolocal = new ValorCampoLocal;
                        $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo);
                        $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                        $valorcampolocal->COM_SolicitudCotizacion_IdSolicitudCotizacion=$detalle;
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
                        $valorcampolocal->save();
                                
                    }
                    
                    $prov_prod = DB::table('INV_Producto_Proveedor')->get();
                    foreach($prov_prod as $key){
                        if($prod[$i] == $key->INV_Proveedor_ID){
                            for($j=0; $j < count($cualquierProducto); $j++){
                                if($cualquierProducto[$j]==$key->INV_Producto_ID){
                                $detallesolicitud= new DetalleSolicitudCotizacion();
                                $detallesolicitud->cantidad=Input::get('CantidadSolicitar'.$cualquierProducto[$j]);
                                $detallesolicitud->SolicitudCotizacion_idSolicitudCotizacion=$detalle;
                                $detallesolicitud->Producto_idProducto=$cualquierProducto[$j];
                                $detallesolicitud->COM_Usuario_idUsuarioCreo=1;
                                $detallesolicitud->save();
                                }
                            }
                        }
                        
                    
                    }
                    
                    $email[]=$detalle;
                    $enviar= Proveedor::find($prod[$i]);
                    Mail::send('emailsCompras', array('email'=>$email) , function ($message) use($enviar){
                        $message->subject('Solicitud ');
                            $message->to($enviar->INV_Proveedor_Email);
                    });
               }
                
                       
                    
                return Redirect::route('Compras.SolicitudCotizacions.index');
              }
              return Redirect::route('seleccion', compact('cualquierProducto', 'proveedor'))
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}
        
        public function detalle(){
            $proveedor= Proveedor::find(Input::get('prov'));
            
            $solicitud= DetalleSolicitudCotizacion::where('SolicitudCotizacion_idSolicitudCotizacion', '=', Input::get('solCot'))->get();
            return View::make('SolicitudCotizacions.detalle', compact('solicitud', 'proveedor'));
        }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$SolicitudCotizacion = $this->SolicitudCotizacion->findOrFail($id);

		return View::make('SolicitudCotizacions.show', compact('SolicitudCotizacion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Solicitud = SolicitudCotizacion::find($id);

		if (is_null($Solicitud))
		{
			return Redirect::route('Compras.indexCampoLocal');
		}

		return View::make('SolicitudCotizacions.edit', compact('Solicitud'));
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
	

		
			$SolicitudCotizacion = SolicitudCotizacion::find($id);
                        $SolicitudCotizacion->COM_SolicitudCotizacion_Recibido=Input::get('COM_SolicitudCotizacion_Recibido');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_FechaModificacion= date('Y-m-d');
                        $SolicitudCotizacion->Usuario_idUsuarioModifico = 2;
                        if(Input::has('COM_SolicitudCotizacion_Activo')){
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                        }else{
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=0;
                        }
			$SolicitudCotizacion->update();

			return Redirect::route('Compras.SolicitudCotizacions.index');
		

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->SolicitudCotizacion->find($id)->delete();

		return Redirect::route('SolicitudCotizacions.index');
	}

}
