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
                $prov=array();
                for($i=0; $i < count($cualquierProducto); $i++){
                    $prov_prod = DB::table('INV_Producto_Proveedor')->get();
                    foreach($prov_prod as $key){
                        if($cualquierProducto[$i] == $key->INV_Producto_ID){
                            $prov[]= $key->INV_Proveedor_ID;
                        }
                    
                    }
                }
                $provfinal = array_unique($prov); 
                $proveedor= array_values($provfinal);
                
            return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor'));
            //return Redirect::route('seleccion', compact('cualquierProducto', 'proveedor'))->withInput();
			
        }

        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
              $cualquierProducto=array();
            
                for ($i = 1; $i <=count(Input::all()); $i++) {
                    if (Input::get('Incluir'.$i)==1){
                        $cualquierProducto[] = Input::get('id'.$i);
                    }
                }
                $prov=array();
                for($i=0; $i < count($cualquierProducto); $i++){
                    $prov_prod = DB::table('INV_Producto_Proveedor')->get();
                    foreach($prov_prod as $key){
                        if($cualquierProducto[$i] == $key->INV_Producto_ID){
                            $prov[]= $key->INV_Proveedor_ID;
                        }
                    
                    }
                }
                $provfinal = array_unique($prov); 
                $proveedor= array_values($provfinal);  
            return View::make('SolicitudCotizacions.create', compact('cualquierProducto', 'proveedor'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                $Input=Input::all();
                $imprimir= array();
                $correo= array();
		$proveedor=Input::get('prove');
            
                $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_SC%')->get();
		$res = SolicitudCotizacion::$rules;
                
                $cualquierProducto=Input::get('cualquiera');
                
                
                for ($j=0; $j< count($proveedor); $j++){
                   $temprod = Proveedor::find($proveedor[$j]);
                   foreach ($campos as $campo) {
                    
			$val = '';
			if ($campo->GEN_CampoLocal_Requerido) {
				$val = $val.'Required|';
			}
			switch ($campo->GEN_CampoLocal_Tipo) {
				case 'TXT':
					$val = $val.'alphanum_spaces|';
					break;				
				case 'INT':
					$val = $val.'Integer|';
					break;
				case 'FLOAT':
					$val = $val.'regex:/^([0-9])*\.[0-9]{2}+$/|';
					break;				
				default:
					break;
			}
			$res = array_merge($res,array($campo->GEN_CampoLocal_Codigo.$temprod->INV_Proveedor_Nombre => $val));
//                        $res = array_merge($res, array('cualquiera'=>'Requerid|min:0|Numeric|'));
                   }
                        
		} 
                for ($j=0; $j< count($cualquierProducto); $j++){
                    
                   
                    $temp = $cualquierProducto[$j];
                    $res=array_merge($res,array('CantidadSolicitar'.$temp => 'Required|Integer|min:1'));
                }
                
                
                
                $validation = Validator::make($Input, $res);
                

		if($validation->passes()){
                for($i=0; $i < count($proveedor); $i++){
                    $email=array();
                    $cont = SolicitudCotizacion::all();
                    $detalle=$cont->count()+1;
                    $solicitudCotizacion = new SolicitudCotizacion();
                    $temprod = Proveedor::find($proveedor[$i]);
                    $solicitudCotizacion->COM_SolicitudCotizacion_Codigo='COM_SC_'.$detalle;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaEmision= date('Y-m-d H:i:s');
                    $solicitudCotizacion->COM_SolicitudCotizacion_DireccionEntrega= 'Los Llanos';
                    $solicitudCotizacion->COM_SolicitudCotizacion_Recibido=0;
                    $solicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaCreacion= date('Y-m-d H:i:s');
                    $solicitudCotizacion->COM_Usuario_idUsuarioCreo=1;
                    $solicitudCotizacion->Proveedor_idProveedor=$proveedor[$i];
                    $solicitudCotizacion->save();
                    
                    foreach($campos as $campo){
                                   // return $campo->GEN_CampoLocal_Codigo;
                                    $valorcampolocal = new ValorCampoLocal;
                                    
                                    $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo.$temprod->INV_Proveedor_Nombre);
                                    
                                    $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                                    $valorcampolocal->COM_SolicitudCotizacion_IdSolicitudCotizacion=$detalle;
                                    $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
                                    $valorcampolocal->save();
                                    
                                  
                                }
                    
                    $prov_prod = DB::table('INV_Producto_Proveedor')->get();
                    foreach($prov_prod as $key){
                        if($proveedor[$i] == $key->INV_Proveedor_ID){
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
                    $ruta = route('Compras.SolicitudCotizacions.index');
                    //captura el id la solicitud de cotizacion
                    $email[]=$detalle;
                    //captura el id del proveedor a quien se lo quiere mandar
                    $enviar= Proveedor::find($proveedor[$i]);
                    if($enviar->INV_Proveedor_Email == NULL){
                    //guarda al que no se manda
                    $imprimir[]= $proveedor[$i];
                    }else{
                        //manda para imprimir a los que se les manda correo, use para agarrar array de proveedores
                        $correo[]= $proveedor[$i];
                        //metodo de enviar el correo, 'emailscompra' es el view,  
                         Mail::send('emailsCompras', array('email'=>$email) , function ($message) use($enviar){
                        $message->subject('Solicitud ');
                            $message->to($enviar->INV_Proveedor_Email);
                    });
                         
                    }
                    
                    
               }
                $mensaje = Mensaje::find(2);
                $mensaje2 = Mensaje::find(3);
                return View::make('MensajeSolicitud', compact('mensaje', 'mensaje2' ,'ruta', 'imprimir', 'correo'));
                       
                    
                
              }
              return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor'))
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
                $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_SC%')->get();
		
                
                
                

		
                        $SolicitudCotizacion = SolicitudCotizacion::find($id);
                        $SolicitudCotizacion->COM_SolicitudCotizacion_Recibido=Input::get('COM_SolicitudCotizacion_Recibido');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_FechaModificacion= date('Y-m-d H:i:s');
                        $SolicitudCotizacion->Usuario_idUsuarioModifico = 2;
                        if(Input::has('COM_SolicitudCotizacion_Activo')){
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                        }else{
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=0;
                        }
                        
			$SolicitudCotizacion->update();

                         $ruta = route('Compras.SolicitudCotizacions.index');
			 $mensaje = Mensaje::find(1);
                         return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                
                
                
		
	

		
			
		

		
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
        
        public function search_index(){

        $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
        //Querys de las columnas propias del Producto
        
            
        $SolicitudCotizacions = SolicitudCotizacion::where('COM_SolicitudCotizacion_Codigo', 'LIKE', '%'.Input::get('search').'%') 
        ->orWhere('COM_SolicitudCotizacion_Recibido', '=',  Input::get('search'))
//        ->orWhere('INV_Producto_ValorCodigoBarras', '=',  Input::get('search'))
//        ->orWhere('INV_Producto_Descripcion', 'LIKE',  '%'.Input::get('search').'%')
        ->paginate();

         

        //Querys de las columnas que tiene relacion con la tabla Proveedor
        $queryPoveedor= Proveedor::where('INV_Proveedor_Nombre','LIKE', '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_RepresentanteVentas', 'LIKE',  '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_Direccion', 'LIKE', '%'.Input::get('search').' %')
        ->orWhere('INV_Proveedor_Email', 'LIKE', '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_Codigo', '=',  Input::get('search'))
        ->orWhere('INV_Proveedor_Telefono', '=',  Input::get('search'))->get();
//
        // reviso si trajo datos para decidir si los proceso         
        if(!empty($queryPoveedor)){
            $temp = array();
            
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryPoveedor as $qP) {
                array_push($temp, $qP->INV_Proveedor_ID);
                
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
              
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            $SolicitudCotizacions=  SolicitudCotizacion::wherein('Proveedor_idProveedor',$temp)->paginate();
            }
        }
//       
//        $inventario=$productos;
        //reemplazo de variable a enviar a la vista
         return View::make('SolicitudCotizacions.index', compact('SolicitudCotizacions','CamposLocales'));
        //return View::make('Proveedor.index', compact('Proveedor'));
    }
        
 }
?>

}
