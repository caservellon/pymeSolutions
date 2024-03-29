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
            if (Seguridad::indexSC()) {
		$SolicitudCotizacions = SolicitudCotizacion::paginate();
                $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
                
		return View::make('SolicitudCotizacions.index', compact('SolicitudCotizacions','CamposLocales'));
               }else {
			return Redirect::to('/403');
		}
	}
        
        public function vistacrear(){
            if (Seguridad::vistaCrearSC()) {
            $cualquierProducto = invCompras::CualquierProducto();
            
            
            return View::make('SolicitudCotizacions.cualquierProducto', compact('cualquierProducto'));
            }else {
			return Redirect::to('/403');
		}
        }
        
        public function vistaReorden(){
            if (Seguridad::vistaReordenSC()) {
                $reOrden = invCompras::ProductoReorden();
                return View::make('SolicitudCotizacions.reOrden', compact('reOrden'));
            }else {
			return Redirect::to('/403');
		}
        }
		
        public function indexImprimir(){
            if (Seguridad::indexImprimirSC()) {
            $SolicitudCotizacions = SolicitudCotizacion::where('COM_SolicitudCotizacion_Imprimir', '=', 0)->paginate();
			$CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
            return View::make('SolicitudCotizacions.indexImprimir', compact('SolicitudCotizacions', 'CamposLocales'));
            }else {
			return Redirect::to('/403');
		}
        }
		
        public function imprimir(){
            if (Seguridad::ImprimirSC()) {
            $imprimir= SolicitudCotizacion::find(Input::get('solCot'));
            //return $imprimir;
            return View::make('SolicitudCotizacions.imprimir', compact('imprimir'));
            }else {
			return Redirect::to('/403');
		}
        }
        
        public function mostrarProveedor(){
            if (Seguridad::crearSC()) {
            $cualquierProducto=array();
            $Input = array();
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
                
                
                //$iguales='';
            return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor','Input'));
            //return Redirect::route('seleccion', compact('cualquierProducto', 'proveedor'))->withInput();
            }else {
			return Redirect::to('/403');
		}
        }

        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            if (Seguridad::crearSC()) {
                $Input=Input::all();
                $imprimir= array();
                $correo= array();
		$proveedor=Input::get('prove');
//                $cantidaigual=array();
//                $cantidaddif=array();
                //$iguales='diferente';
                $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_SC%')->get();
		$res = SolicitudCotizacion::$rules;
                
                
                
                $cualquierProducto=Input::get('cualquiera');
//                for ($j=0; $j< count($proveedor); $j++){
//                    $temprod = invCompras::ProveedorCompras($proveedor[$j]);
//                   $nombret = str_replace(' ', '', $temprod->INV_Proveedor_Nombre);
//                    for ($k=0; $k< count($cualquierProducto); $k++){
//                        $temp = invCompras::ProductoCompras($cualquierProducto[$k]);
//                    
//                        $nombre = str_replace(' ', '', $temp->INV_Producto_Nombre);
//                        $cantidaigual[]=Input::get('CantidadSolicitar'.$nombret.$nombre);
//                        $cantidaddif[]=$cantidaigual[0];
//                        
//                    }
//                }
                
                
                for ($j=0; $j< count($proveedor); $j++){
                   $temprod = invCompras::ProveedorCompras($proveedor[$j]);
                   $nombret = str_replace(' ', '', $temprod->INV_Proveedor_Nombre);
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
			$res = array_merge($res,array($campo->GEN_CampoLocal_Codigo.$nombret => $val));
//                        $res = array_merge($res, array('cualquiera'=>'Requerid|min:0|Numeric|'));
                   }
                        
		
                
                for ($k=0; $k< count($cualquierProducto); $k++){
                    
                   $cualquierProducto1 = invCompras::ProductoCompras($cualquierProducto[$k]);
                    $temp = invCompras::ProveedorProducto($temprod->INV_Proveedor_ID);
                    foreach ($temp as $prod){
                        if($cualquierProducto1->INV_Producto_ID == $prod->INV_Producto_ID){
                        $nombre = str_replace(' ', '', $prod->INV_Producto_Nombre);
                    
                        $res=array_merge($res,array('CantidadSolicitar'.$nombret.$nombre => 'Required|Integer|min:1'));
                        }
                    }
                    
                    
                    }
                }
                
//                if($cantidaigual!=$cantidaddif){
//                       $iguales='Cantidad';
//                       return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor','iguales'));
//                      
//                       
//                    }
                 
                
                $validation = Validator::make($Input, $res);
                
                
		if($validation->passes()){
                
        	for($i=0; $i < count($proveedor); $i++){
            		$email=array();
                    $cont = SolicitudCotizacion::all();
                    $detalle=$cont->count()+1;
                    $solicitudCotizacion = new SolicitudCotizacion();
                    $temprod =  invCompras::ProveedorCompras($proveedor[$i]);
                    $nombret = str_replace(' ', '', $temprod->INV_Proveedor_Nombre);
                    $solicitudCotizacion->COM_SolicitudCotizacion_Codigo='COM_SC_'.$detalle;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaEmision= date('Y-m-d H:i:s');
                    $solicitudCotizacion->COM_SolicitudCotizacion_DireccionEntrega= 'Los Llanos';
                    $solicitudCotizacion->COM_SolicitudCotizacion_FormaPago=Input::get('formapago'.$nombret);
                    $solicitudCotizacion->COM_SolicitudCotizacion_Recibido=0;
					
                    $solicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                    $solicitudCotizacion->COM_SolicitudCotizacion_FechaCreacion= date('Y-m-d H:i:s');
                    $solicitudCotizacion->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Username;
                    $solicitudCotizacion->Proveedor_idProveedor=$proveedor[$i];
                    $solicitudCotizacion->save();
                    
                    foreach($campos as $campo){
                                   // return $campo->GEN_CampoLocal_Codigo;
                                    $valorcampolocal = new ValorCampoLocal;
                                    
                                    $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo.$nombret);
                                    
                                    $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                                    $valorcampolocal->COM_SolicitudCotizacion_IdSolicitudCotizacion=$detalle;
                                    $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
									$valorcampolocal->COM_ValorCampoLocal_FechaCreacion= date('Y-m-d H:i:s');
                                    $valorcampolocal->save();
                                    
                                  
                    }
                    
                    $prov_prod = invCompras::ProveedorProducto($proveedor[$i]);
                    foreach($prov_prod as $key){
                        
                            for($j=0; $j < count($cualquierProducto); $j++){
                                if($cualquierProducto[$j]==$key->INV_Producto_ID){
                                	$detallesolicitud= new DetalleSolicitudCotizacion();
                                	$temp = invCompras::ProductoCompras($cualquierProducto[$j]);
                                	$nombre = str_replace(' ', '', $temp->INV_Producto_Nombre);
                                
                                        $detallesolicitud->COM_DetalleSolicitudCotizacion_cantidad=Input::get('CantidadSolicitar'.$nombret.$nombre);
                                
                                	$detallesolicitud->COM_DetalleSolicitudCotizacion_idSolicitudCotizacion=$detalle;
                                	$detallesolicitud->Producto_idProducto=$cualquierProducto[$j];
                                	$detallesolicitud->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Username;
									$detallesolicitud->COM_DetalleSolicitudCotizacion_FechaCreo=date('Y-m-d H:i:s');
                                	$detallesolicitud->save();
								}
                            }
                        
                        
                    
                    }
                    $ruta = route('Compras.SolicitudCotizacions.index');
                    //captura el id la solicitud de cotizacion
                    $email[]=$detalle;
                    //captura el id del proveedor a quien se lo quiere mandar
                    $enviar= invCompras::ProveedorCompras($proveedor[$i]);
		    $solicitud = SolicitudCotizacion::find($detalle);
                    if($enviar->INV_Proveedor_Email == NULL){
                    //guarda al que no se manda
						$solicitud->COM_SolicitudCotizacion_Imprimir=0;
						$solicitud->save();
                    	$imprimir[]= $proveedor[$i];
                    }else{
						
						$solicitud->COM_SolicitudCotizacion_Imprimir=1;
						$solicitud->save();
                        //manda para imprimir a los que se les manda correo, use para agarrar array de proveedores
                        $correo[]= $proveedor[$i];
                        //metodo de enviar el correo, 'emailscompra' es el view,  
                    	Mail::later(10,'emailsCompras', array('email'=>$email) , function ($message) use($enviar){
                        	 $message->subject('Solicitud ');
                            $message->to($enviar->INV_Proveedor_Email);
                    	});
                         
                    }
                    
					
					
                    
               }
               
                $imprimir3 = Mensaje::find(2);
                $imprimir2 = Mensaje::find(3);
                $mensaje = 'Las Solicitudes de Cotizacion'.' '.$imprimir3->GEN_Mensajes_Mensaje;
                $mensaje2 = 'Las Solicitudes de Cotizacion'.' '.$imprimir2->GEN_Mensajes_Mensaje;
                return View::make('MensajeSolicitud', compact('mensaje', 'mensaje2' ,'ruta', 'imprimir', 'correo'));
                       
                    
                
              }
              
              return View::make('SolicitudCotizacions.proveedores', compact('cualquierProducto', 'proveedor'))
                     ->with('Input',$Input)
                     ->withErrors($validation)
                     ->with('message', 'There were validation errors.');
              }else {
			return Redirect::to('/403');
		}
              
	}
        
        public function detalle(){
            if (Seguridad::detalleSC()) {
            $proveedor= invCompras::ProveedorCompras(Input::get('prov'));
            
            $solicitud= 						DetalleSolicitudCotizacion::where('COM_DetalleSolicitudCotizacion_idSolicitudCotizacion', '=', Input::get('solCot'))->get();
            return View::make('SolicitudCotizacions.detalle', compact('solicitud', 'proveedor'));
            }else {
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
            if (Seguridad::editSC()) {
		$Solicitud = SolicitudCotizacion::find($id);

		if (is_null($Solicitud))
		{
			return Redirect::route('Compras.indexCampoLocal');
		}

		return View::make('SolicitudCotizacions.edit', compact('Solicitud'));
                }else {
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
            if (Seguridad::editSC()) {
                $input = Input::except('_method');
                $imprimir = Mensaje::find(1);
                $mensaje = $imprimir->GEN_Mensajes_Mensaje;
                
                //$campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_SC%')->get();
		$res = SolicitudCotizacion::$rules;
                if(Input::get('COM_SolicitudCotizacion_CantidadPago')==''){
                    $res = array_merge($res,array( 'COM_SolicitudCotizacion_CantidadPago'=> 'Required|'));
                }
                if(Input::get('COM_SolicitudCotizacion_PeriodoGracia')==''){
                    $res = array_merge($res,array( 'COM_SolicitudCotizacion_PeriodoGracia'=> 'Required|'));
                }
                $validation = Validator::make($input, $res);
                
                
                
                        if($validation->passes()){
		
                        $SolicitudCotizacion = SolicitudCotizacion::find($id);
                        //$temprod = invCompras::ProveedorCompras($SolicitudCotizacion->Proveedor_idProveedor);
                        $detallesolicitud = DetalleSolicitudCotizacion::where('COM_DetalleSolicitudCotizacion_idSolicitudCotizacion', '=', $SolicitudCotizacion->COM_SolicitudCotizacion_IdSolicitudCotizacion)->get();
                        //return $detallesolicitud;
                        //return Input::get('formapago');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_Recibido=Input::get('COM_SolicitudCotizacion_Recibido');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_FechaModificacion= date('Y-m-d H:i:s');
                        if($SolicitudCotizacion->COM_SolicitudCotizacion_Imprimir==0){
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Imprimir= 1;
                        }
                        
                        $SolicitudCotizacion->Usuario_idUsuarioModifico = Auth::user()->SEG_Usuarios_Username;
                        $SolicitudCotizacion->COM_SolicitudCotizacion_FormaPago=Input::get('formapago');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_CantidadPago=Input::get('COM_SolicitudCotizacion_CantidadPago');
                        $SolicitudCotizacion->COM_SolicitudCotizacion_PeriodoGracia=Input::get('COM_SolicitudCotizacion_PeriodoGracia');
                        if(Input::has('COM_SolicitudCotizacion_Activo')){
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=1;
                        }else{
                            $SolicitudCotizacion->COM_SolicitudCotizacion_Activo=0;
                        }
                        
			$SolicitudCotizacion->update();
						//$detallesolicitud = DetalleSolicitudCotizacion::where('COM_DetalleSolicitudCotizacio_idSolicitudCotizacion', '=', $SolicitudCotizacion->COM_SolicitudCotizacion_IdSolicitudCotizacion);
						foreach($detallesolicitud as $value){
							$value->COM_DetalleSolicitudCotizacion_FechaModificacion= date('Y-m-d H:i:s');
							$value->Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Username;
							$value->update();
						}

                         $ruta = route('Compras.SolicitudCotizacions.index');
			 
                         return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                        }
                        
                        return Redirect::route('Compras.SolicitudCotizacions.edit',$id)
                        ->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
                
               }else {
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
		$this->SolicitudCotizacion->find($id)->delete();

		return Redirect::route('SolicitudCotizacions.index');
	}
        
        public function buscarCualquierProducto(){
        
         $val= '%'.Input::get('search').'%';  
        $cualquierProducto = DB::table('INV_Producto')->where('INV_Producto_Codigo', 'LIKE', $val)
        ->orWhere('INV_Producto_Nombre', 'LIKE', $val)
        ->orWhere('INV_Producto_Descripcion', 'LIKE', $val)
        ->orWhere('INV_Producto_PrecioVenta', 'LIKE', $val)
        ->orWhere('INV_Producto_Cantidad', 'LIKE', $val)
        ->orWhere('INV_Producto_PuntoReorden', 'LIKE', $val)
        ->orWhere('INV_Producto_PrecioCosto', 'LIKE', $val)
        ->get();


		

        
        
         return View::make('SolicitudCotizacions.cualquierProducto', compact('cualquierProducto'));
        //return View::make('Proveedor.index', compact('Proveedor'));
    }
    
    public function buscarCualquierProveedor(){
        $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
        
         $val= '%'.Input::get('search').'%';  
        $SolicitudCotizacions = DB::table('COM_SolicitudCotizacion')->where('COM_SolicitudCotizacion_Codigo', 'LIKE', '%'.$val.'%')
        ->paginate();

        $queryPoveedor= Proveedor::where('INV_Proveedor_Nombre','LIKE', '%'.$val.'%')
           ->get();
        
        if(!empty($queryPoveedor)){
            $temp = array();
            
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryPoveedor as $qP) {
                array_push($temp, $qP->INV_Proveedor_ID);
                
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
                
              //$SolicitudCotizacions = array_merge($SolicitudCotizacions,$temp);
              //return $SolicitudCotizacions;
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            $SolicitudCotizacions=  SolicitudCotizacion::wherein('Proveedor_idProveedor',$temp)->paginate();
            
            }
            
        }
        
        return View::make('SolicitudCotizacions.indexImprimir', compact('SolicitudCotizacions','CamposLocales'));
        
        
        
        
         
    }
        
        public function search_index(){
            
            
            
        $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
        //Querys de las columnas propias del Producto
        
        $val= Input::get('search');  
        if(($val == 'Recibido')||($val== 'recibido'))
            $val=1;
        if(($val== 'En Espera')||($val== 'en espera'))
            $val=0;
        
        $SolicitudCotizacions = DB::table('COM_SolicitudCotizacion')->where('COM_SolicitudCotizacion_Codigo', 'LIKE', '%'.$val.'%')
//        ->orWhere('COM_SolicitudCotizacion_CantidadPago', '=',  $val)
//        ->orWhere('COM_SolicitudCotizacion_PeriodoGracia', '=',  $val)
//       ->orWhere('COM_SolicitudCotizacion_Recibido', 'LIKE',  $val.'%')
        ->lists('COM_SolicitudCotizacion_IdSolicitudCotizacion');
        
        
        //Querys de las columnas que tiene relacion con la tabla Proveedor
        $queryPoveedor= Proveedor::where('INV_Proveedor_Nombre','LIKE', '%'.$val.'%')
//        ->orWhere('INV_Proveedor_RepresentanteVentas', 'LIKE',  $val.'%')
//        ->orWhere('INV_Proveedor_Direccion', 'LIKE', $val.'%')
//        ->orWhere('INV_Proveedor_Email', 'LIKE', $val.'%')
//        ->orWhere('INV_Proveedor_Codigo', 'LIKE',  $val.'%')
//        ->orWhere('INV_Proveedor_Telefono', 'LIKE',  $val.'%')
           ->get();
        
        $queryForma= FormaPago::where('INV_FormaPago_Nombre','LIKE', '%'.$val.'%')
        ->get();
        
       
        // reviso si trajo datos para decidir si los proceso         
        
       $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1);
         
		 if ($campos) {
                     
                        //return $val;
			$noListas = $campos->where('GEN_CampoLocal_Tipo','<>','LIST')->lists('GEN_CampoLocal_ID');
                        
			$listas = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1)->where('GEN_CampoLocal_Tipo','LIST')->lists('GEN_CampoLocal_ID');
                        
                        if ($noListas) {
                                
                                
				$SolicitudCotizacions = array_merge($SolicitudCotizacions,DB::table('COM_ValorCampoLocal')->whereIn('COM_CampoLocal_IdCampoLocal',$noListas)->where('COM_ValorCampoLocal_Valor','LIKE',$val.'%')->lists('COM_SolicitudCotizacion_IdSolicitudCotizacion'));
                                
			}
			if ($listas) {
                                //return $listas;
				$valorLista = DB::table('GEN_CampoLocalLista')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->where('GEN_CampoLocalLista_Valor','LIKE', $val.'%')->lists('GEN_CampoLocalLista_Valor');
                                //return $valorLista;
				if($valorLista) {
                                        //return $val;
					$SolicitudCotizacions = array_merge($SolicitudCotizacions,DB::table('COM_ValorCampoLocal')->whereIn('COM_CampoLocal_IdCampoLocal',$listas)->whereIn('COM_ValorCampoLocal_Valor',$valorLista)->lists('COM_SolicitudCotizacion_IdSolicitudCotizacion'));
                                        //return $SolicitudCotizacions;
				}
			}
			
                        if($SolicitudCotizacions){
                            $SolicitudCotizacions= SolicitudCotizacion::wherein('COM_SolicitudCotizacion_IdSolicitudCotizacion',$SolicitudCotizacions)->paginate();
                            //return $SolicitudCotizacions;
                        }
                        
                        
		}
                
               if(!empty($queryPoveedor)){
            $temp = array();
            
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryPoveedor as $qP) {
                array_push($temp, $qP->INV_Proveedor_ID);
                
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
                
              //$SolicitudCotizacions = array_merge($SolicitudCotizacions,$temp);
              //return $SolicitudCotizacions;
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            $SolicitudCotizacions=  SolicitudCotizacion::wherein('Proveedor_idProveedor',$temp)->paginate();
            
            }
            
        } 
        if(!empty($queryForma)){
            $temp = array();
            
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryForma as $qP) {
                array_push($temp, $qP->INV_FormaPago_ID);
                
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
              
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            //$SolicitudCotizacions = array_merge($SolicitudCotizacions,$temp);
            $SolicitudCotizacions=  SolicitudCotizacion::wherein('COM_SolicitudCotizacion_FormaPago',$temp)->paginate();
            }
            
        } 
            if(!empty($SolicitudCotizacions)){
                //return $SolicitudCotizacions;
                //$SolicitudCotizacions= SolicitudCotizacion::wherein('COM_SolicitudCotizacion_IdSolicitudCotizacion',$SolicitudCotizacions)->paginate();
                return View::make('SolicitudCotizacions.index', compact('SolicitudCotizacions','CamposLocales'));
            }else{
                $ruta = route('Compras.SolicitudCotizacions.index');
 			   	$mensaje = Mensaje::find(4);
                return View::make('MensajeCompra', compact('mensaje', 'ruta'));
            }
                
       // $inventario=$productos;
        //reemplazo de variable a enviar a la vista
//         $SolicitudCotizacions=  SolicitudCotizacion::wherein('Proveedor_idProveedor',$temp)->paginate();
         
        //return View::make('Proveedor.index', compact('Proveedor'));
    }
        
 }
?>

}
