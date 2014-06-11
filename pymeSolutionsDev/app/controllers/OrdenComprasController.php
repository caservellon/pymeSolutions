<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class OrdenComprasController extends BaseController {

    /**
     * OrdenCompra Repository
     *
     * @var OrdenCompra
     */
    protected $OrdenCompra;
        //reglas de validacion



    public function __construct(OrdenCompra $OrdenCompra)
    {
        $this->OrdenCompra = $OrdenCompra;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    
        public function index(){
            if(Seguridad::indexOC()){
                $OrdenCompra = OrdenCompra::paginate();
                
                //return $ordencompra; 
                $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get();
                return View::make('OrdenCompras.index', compact('OrdenCompra', 'CamposLocales'));
            }else {
            return Redirect::to('/403');
        }
        }
        public function indexImprimir(){
            if(Seguridad::indexImprimirOC()){
            $ordencompra = OrdenCompra::where('COM_OrdenCompra_Imprimir', '=', 0)->paginate();
            //return $ordencompra; 
            $CamposLocales = CampoLocal::where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get();
            return View::make('OrdenCompras.indexImprimir', compact('ordencompra', 'CamposLocales'));
            }else {
            return Redirect::to('/403');
        }
        }
		
        public function imprimir(){
            if(Seguridad::ImprimirOC()){
            $imprimir= OrdenCompra::find(Input::get('ordImp'));
            //return $imprimir;
            return View::make('OrdenCompras.imprimir', compact('imprimir'));
            }else {
            return Redirect::to('/403');
        }
        }
        //funciones hechas para crear una orden de compra sin cotizacion
        public function OrdenComprasnCotizacion(){

            if(Seguridad::nuevaOrdenCompraSinCotizacion()){
            $inventario= invCompras::CualquierProducto();
            return View::make('OrdenCompras.NuevaOrdenCompraSinCotizacion',array('inventario'=>$inventario,'proveedor'=> 1));
            }else {
            return Redirect::to('/403');
        }
        }
         public function FormOrdenComprasnCotizacion(){
            if(Seguridad::detalleNuevaOrdenCompras()){
            
             $input=Input::all();
             $contador=0;
             $productos=array();
             $proveedor=Input::get('proveedor');
             
             foreach ($input as $form){
                 $contador++;
                 if(Input::has('incluir'.$contador)){
                     $relaciones=DB::table('INV_Producto_Proveedor')->where('INV_Producto_ID', '=',Input::get('Id'.$contador) )->get();
                     foreach ($relaciones as $relacion){
                         if($relacion->INV_Proveedor_ID==$proveedor){
                             $productos[]=Input::get('Id'.$contador);
                         }
                     }
                 } 
             }
             if(sizeof($productos)<1){
                 $ruta = route('index');
                 $mensajeBD = Mensaje::find(1);
                    $mensaje= 'La Orden de Compra No se puede generar para este Proveedor ';
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
             }else{
                $products=Producto::wherein('INV_Producto_ID',$productos)->get();
             }
             
            
            return View::make('OrdenCompras.OrdenCompraForm',array('proveedor'=>$proveedor ,'productos'=>$products));
            }else {
            return Redirect::to('/403');
        }
        }
        
//funcion para guardar la orden de compra sin cotizacion
        public function guardarOCsnCOT(){
            if(Seguridad::GuardarNuevaOrdenCompra()){
             $input=Input::all();
             $contador=0;
             $contador2=0;
             $proveedor=Input::get('COM_Proveedor_IdProveedor');
             $productos=array();
             $imprimir=array();
             $correo= array();
            
                                        
//obtener los datos del detalle para poder validarlos
             $detalle = array();
             $orden= array('COM_OrdenCompra_FechaEntrega'=>  Input::get('COM_OrdenCompra_FechaEntrega'),
                'COM_Proveedor_IdProveedor' => Input::get('COM_Proveedor_IdProveedor'),
                'COM_OrdenCompra_FormaPago'=>Input::get('formapago'),
                'COM_OrdenCompra_Total'=>Input::get('totalGeneral'),'COM_OrdenCompra_Direccion'=>Input::get('COM_OrdenCompra_Direccion'),'COM_OrdenCompra_PeriodoGracia'=>Input::get('COM_OrdenCompra_PeriodoGracia'),'COM_OrdenCompra_CantidadPago'=>Input::get('COM_OrdenCompra_CantidadPago'));
                $validacionorden = Validator::make($orden , OrdenCompra::$rules );
//validacion de campos Locales se registra el perfin en busca de los campos locales q me interesan
                $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_OC%')->get();

        
//creando el array con lo productos por si es nesesario regresar data
             foreach ($input as $form){
                if(Input::has('producto'.$contador2)){
                    $productos[]=Input::get('producto'.$contador2);
                }
                $contador2++;
             }
//recoriendo arreglo para sacar datos
             foreach ($input as $form){
//metiendo los datos para validacion
                if(Input::has('producto'.$contador)){
                    $detalle = array('COM_DetalleOrdenCompra_Cantidad' => Input::get('cantidad'.$contador),'COM_DetalleOrdenCompra_PrecioUnitario' => Input::get('total'.$contador));
                        $validacionGeneral = array_merge($detalle , $orden);
                        //$reglGeneral = array_merge(COMDetalleOrdenCompra::$rules , OrdenCompra::$rules);
                        $validacion= Validator::make($validacionGeneral ,COMDetalleOrdenCompra::$rules);
                    if(!$validacion->passes()){
                         $products=Producto::wherein('INV_Producto_ID',$productos)->get();
                        return View::make('OrdenCompras.OrdenCompraForm', array('proveedor' => $proveedor , 'productos' => $products ))->withInput($input)->withErrors($validacion);
                    }  
                }
                $contador++;
            }
            //return 'valido';
//se extrae las reglas de un modelo relacionado
                $validacionCampos = OrdenCompra::$rule;
                
               foreach ($campos as $campo) {
                   $val = '';
                    if ($campo->GEN_CampoLocal_Requerido == '1') {
                        $val = $val.'required|';
                        
                        
                    }
                    switch ($campo->GEN_CampoLocal_Tipo) {
                        case 'TXT':
                             $val = $val.'alpha_spaces|';
                        break;              
                        case 'INT':
                            $val = $val.'integer|';
                        break;
                        case 'FLOAT':
                            $val = $val.'numeric|';
                        break;              
                        default:
                        break;
//se agreegan los campos para ser valorados
                        
                    
                    
                    }
                    $validacionCampos = array_merge($validacionCampos,array($campo->GEN_CampoLocal_Codigo => $val));
//se valoran los campos
                }    
             $validacion= Validator::make($input ,$validacionCampos);
                    if(!$validacion->passes()){
                         $products=Producto::wherein('INV_Producto_ID',$productos)->get();
                        return View::make('OrdenCompras.OrdenCompraForm', array('proveedor' => $proveedor , 'productos' => $products ))->withInput($input)->withErrors($validacion);
                    } 
             
//guardo la Orden de Compra
                $validacionOrden= Validator::make($input ,OrdenCompra::$rules);
                //return Input::get('COM_OrdenCompra_FechaEntrega');
            
             $OrdenCompras=  new OrdenCompra();
             $ultimoI= OrdenCompra::count();
             $OrdenCompras->COM_OrdenCompra_Codigo='COM_OC_'.($ultimoI+1);
             $OrdenCompras->COM_OrdenCompra_FechaEmision= date('Y/m/d H:i:s');
             $OrdenCompras->COM_OrdenCompra_FechaEntrega=  Input::get('COM_OrdenCompra_FechaEntrega');
             $OrdenCompras->COM_OrdenCompra_ISV=  Input::get('pISV');
             if(Input::has('COM_OrdenCompra_Activo')){
                    $OrdenCompras->COM_OrdenCompra_Activo=1;
             }else{
                    $OrdenCompras->COM_OrdenCompra_Activo=0;
             }
             $OrdenCompras->COM_OrdenCompra_FechaCreacion=date('Y/m/d H:i:s');
             $OrdenCompras->COM_Usuario_IdUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
             $OrdenCompras->COM_Proveedor_IdProveedor=Input::get('COM_Proveedor_IdProveedor');
             $OrdenCompras->COM_OrdenCompra_FormaPago=Input::get('formapago');
			 
             $OrdenCompras->COM_OrdenCompra_Total=Input::get('totalGeneral');
             $OrdenCompras->COM_OrdenCompra_CantidadPago=Input::get('COM_OrdenCompra_CantidadPago');
             $OrdenCompras->COM_OrdenCompra_PeriodoGracia=Input::get('COM_OrdenCompra_PeriodoGracia');
             $OrdenCompras->save();
             $compras=  OrdenCompra::all();
             $ultimo= $compras->Count();
             
             //guardo los detalles
             $contador1=1;
             foreach($campos as $campo){
                        $valorcampolocal = new ValorCampoLocal;
                        $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo);
                        $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                        $valorcampolocal->COM_OrdenCompra_IdOrdenCompra=($ultimoI+1);
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                         $valorcampolocal->save();
                                
                    }

              foreach ($input as $form){
                  if(Input::has('cantidad'.$contador1)>0){
                    $ultDet= COMDetalleOrdenCompra::count();
                  $detalle1=new COMDetalleOrdenCompra();
                  $detalle1->COM_DetalleOrdenCompra_Cantidad=Input::get('cantidad'.$contador1);
                  $detalle1->COM_DetalleOrdenCompra_PrecioUnitario=Input::get('precio'.$contador1);
                  $detalle1->COM_DetalleOrdenCompra_idOrdenCompra=$ultimo;
                  $detalle1->COM_Producto_idProducto=Input::get('producto'.$contador1);
                  $detalle1->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                  $detalle1->COM_DetalleOrdenCompra_Codigo='COM_DOC_'.($ultDet+1);
                  $detalle1->save();
                  
                  }
                  $contador1++;
              }
              
              //guardo el Historial
                        $ultHis= HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultHis+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$ultimo;
                      //$historial->COM_OrdenCompra_TransicionEstado_Id=1;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion='Esta es la transicion creada al inicio';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=1;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=3;
                      $historial->save();
                      
                      //$ruta = route('Compras.SolicitudCotizacions.index');
                    //captura el id la solicitud de cotizacion
                    
                    //captura el id del proveedor a quien se lo quiere mandar
                    $ordenemail = OrdenCompra::find($ultimoI+1);
                    $email=array();
                    $email[]=$ordenemail->COM_OrdenCompra_IdOrdenCompra;
                    $enviar= invCompras::ProveedorCompras($ordenemail->COM_Proveedor_IdProveedor);
		    
                    if($enviar->INV_Proveedor_Email == NULL){
                    //guarda al que no se manda
                        $ordenemail->COM_OrdenCompra_Imprimir=0;
                        $ordenemail->save();
                    	$imprimir[]=$enviar->INV_Proveedor_ID;
                    }else{
						
			$ordenemail->COM_OrdenCompra_Imprimir=1;
			$ordenemail->save();
                        //manda para imprimir a los que se les manda correo, use para agarrar array de proveedores
                        $correo[]= $enviar->INV_Proveedor_ID;
                        //metodo de enviar el correo, 'emailscompra' es el view,  
                        
                    	Mail::later(10,'emailsOrdenCompras', array('email'=>$email) , function ($message) use($enviar){
                        	 $message->subject('Orden de Compra');
                            $message->to($enviar->INV_Proveedor_Email);
                    	});
                         
                    }
                       
                    $ruta = route('Compras.OrdenCompra.index');
                    $imprimir3 = Mensaje::find(2);
                    $imprimir2 = Mensaje::find(3);
                    $mensaje = 'La Orden de Compra'.' '.$imprimir3->GEN_Mensajes_Mensaje;
                    $mensaje2 = 'La Orden de Compra'.' '.$imprimir2->GEN_Mensajes_Mensaje;
                    return View::make('MensajeSolicitud', compact('mensaje', 'mensaje2' ,'ruta', 'imprimir', 'correo'));
                    }else {
            return Redirect::to('/403');
        }
                

        }
        
        
        
        
        //funciones hechas para crear una orden de Compra Con Cotizacion
        public function OrdenCompracnCotizacion(){
            if(Seguridad::nuevaOrdenCompraConCotizacion()){
             $cotizaciones = Cotizacion::where('COM_Cotizacion_Vigente','=',1)->get();
            return View::make('OrdenCompras.NuevaOrdenCompraConCotizacion',array('cotizaciones'=> $cotizaciones));
            }else {
            return Redirect::to('/403');
        }
        }
         public function ComparaCotizaciones(){
            if(Seguridad::CompararCotizacion()){
             $contador=0;
             $cotizaciones=array();
             
             $input=Input::all();
             
                foreach ($input as $in){
                    if(Input::has('comparar'.$contador)){
                        array_push($cotizaciones, Input::get('id_cotizacion'.$contador));
                        //$cotizaciones[]=Input::get('id_cotizacion'.$contador);
                    }
                    $contador++;
                }

                if(sizeof($cotizaciones)>1){
                    $Cotizaciones=Cotizacion::wherein('COM_Cotizacion_IdCotizacion',$cotizaciones)->get();
                    
                return View::make('OrdenCompras.CompararCotizaciones',array('cotizaciones'=>$Cotizaciones ));
                }else{
                    return Redirect::route('ComCot', array('id'=>$cotizaciones[0]));
                }
             
            return View::make('OrdenCompras.CompararCotizaciones');
            }else{
                    return Redirect::route('ComCot', array('id'=>$cotizaciones[0]));
            }
        }
        public function FormOrdenCompracnCotizacion(){
            if(Seguridad::detalleNuevaOrdenCompraConCotizacion()){
            $cotizacion= Cotizacion::find(Input::get('id'));
            //return Input::get('id');
            $detalles= COM_DetalleCotizacion::where('COM_DetalleCotizacion_IdCotizacion','=',$cotizacion->COM_Cotizacion_IdCotizacion)->get();
            /*DB::table('COM_DetalleCotizacion')->select('COM_DetalleCotizacion_IdDetalleCotizacion','COM_DetalleCotizacion_Codigo','COM_DetalleCotizacion_Cantidad','COM_DetalleCotizacion_PrecioUnitario','COM_DetalleCotizacion_IdCotizacion','COM_Producto_Id_Producto','COM_Usuario_idUsuarioCreo')->where('COM_DetalleCotizacion_IdCotizacion','=',$cotizacion->COM_Cotizacion_IdCotizacion)->get();*/
            $productos=array();
            foreach ($detalles as $detalle){
                $productos[]=$detalle->COM_Producto_Id_Producto;
            }
            $proveedor= $cotizacion->COM_Proveedor_idProveedor;
            //echo $cotizacion->COM_Proveedor_idProveedor;
            return View::make('OrdenCompras.CotOrdenCompraForm',array('proveedor'=>$proveedor ,'productos'=>$productos,'id_cot'=>Input::get('id')));
            }else{
                    return Redirect::route('ComCot', array('id'=>$cotizaciones[0]));
            }
        }

         public function guardarOCcnCOT(){
            if(Seguridad::guardarNuevaOrdenCompraConCotizacion()){
             $input=Input::all();
             $contador=0;
             $imprimir=array();
             $correo= array();
              $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo', 'like', 'COM_OC%')->get();

             //se extrae las reglas de un modelo relacionado
                $validacionCampos = OrdenCompra::$rule;
                
               foreach ($campos as $campo) {
                   $val = '';
                    if ($campo->GEN_CampoLocal_Requerido == '1') {
                        $val = $val.'required|';
                        
                        
                    }
                    switch ($campo->GEN_CampoLocal_Tipo) {
                        case 'TXT':
                             $val = $val.'alpha_spaces|';
                        break;              
                        case 'INT':
                            $val = $val.'integer|';
                        break;
                        case 'FLOAT':
                            $val = $val.'numeric|';
                        break;              
                        default:
                        break;
//se agreegan los campos para ser valorados
                        
                    
                    
                    }
                    $validacionCampos = array_merge($validacionCampos,array($campo->GEN_CampoLocal_Codigo => $val));
//se valoran los campos
                }    
             $validacion= Validator::make($input ,$validacionCampos);
                    if(!$validacion->passes()){
                         $products=Producto::wherein('INV_Producto_ID',$productos)->get();
                        return View::make('OrdenCompras.OrdenCompraForm', array('proveedor' => $proveedor , 'productos' => $products ))->withInput($input)->withErrors($validacion);
                    } 
             
             //guardo la Orden de Compra
             $OrdenCompras=  new OrdenCompra();
             $ultimoI= OrdenCompra::count();
             $OrdenCompras->COM_OrdenCompra_Codigo='COM_OC_'.($ultimoI+1);
             $OrdenCompras->COM_OrdenCompra_FechaEmision= date('Y/m/d H:i:s');
             $OrdenCompras->COM_OrdenCompra_FechaEntrega=  Input::get('COM_OrdenCompra_FechaEntrega');
             $OrdenCompras->COM_OrdenCompra_ISV=  Input::get('isv');
             if(Input::has('COM_OrdenCompra_Activo')){
                    $OrdenCompras->COM_OrdenCompra_Activo=1;
             }else{
                    $OrdenCompras->COM_OrdenCompra_Activo=0;
             }
             $OrdenCompras->COM_OrdenCompra_FechaCreacion=date('Y/m/d H:i:s');
             $OrdenCompras->COM_Usuario_IdUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
             $OrdenCompras->COM_Proveedor_IdProveedor=Input::get('COM_Proveedor_IdProveedor');
             $OrdenCompras->COM_OrdenCompra_FormaPago=Input::get('formapago');
             $OrdenCompras->COM_OrdenCompra_IdCotizacion=Input::get('Id_Cot');
             $OrdenCompras->COM_OrdenCompra_Total=Input::get('totalG');
             $OrdenCompras->COM_OrdenCompra_CantidadPago=Input::get('COM_OrdenCompra_CantidadPago');
             $OrdenCompras->COM_OrdenCompra_PeriodoGracia=Input::get('COM_OrdenCompra_PeriodoGracia');
             $OrdenCompras->save();
             $compras=  OrdenCompra::all();
             $ultimo= $compras->Count();

             foreach($campos as $campo){
                        $valorcampolocal = new ValorCampoLocal;
                        $valorcampolocal->COM_ValorCampoLocal_Valor=Input::get($campo->GEN_CampoLocal_Codigo);
                        $valorcampolocal->COM_CampoLocal_IdCampoLocal=$campo->GEN_CampoLocal_ID;
                        $valorcampolocal->COM_OrdenCompra_IdOrdenCompra=($ultimoI+1);
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                         $valorcampolocal->save();
                                
                    }

             
             //guardo los detalles
                    $contador=0;
                    
              foreach ($input as $form){
                  if(Input::has('COM_DetalleOrdenCompra_Cantidad'.$contador)>0){
                    echo'hola';
                    $ultDet= COMDetalleOrdenCompra::count();
                  $detalle=new COMDetalleOrdenCompra();
                  $detalle->COM_DetalleOrdenCompra_Cantidad=Input::get('COM_DetalleOrdenCompra_Cantidad'.$contador);
                  $detalle->COM_DetalleOrdenCompra_PrecioUnitario=Input::get('COM_DetalleOrdenCompra_PrecioUnitario'.$contador);
                  $detalle->COM_DetalleOrdenCompra_idOrdenCompra=$ultimo;
                  $detalle->COM_Producto_idProducto=Input::get('COM_Producto_idProducto'.$contador);
                  $detalle->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                  $detalle->COM_DetalleOrdenCompra_Codigo='COM_DOC_'.($ultDet+1);
                  $detalle->save();
                  
                  }
                  $contador++;
              }
              
              //guardo el Historial
                        $ultHis= HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultHis+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$ultimo;
                      //$historial->COM_OrdenCompra_TransicionEstado_Id=1;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta es la transicion creada al inicio';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=1;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=3;
                      $historial->save();
                      
                    $ordenemail = OrdenCompra::find($ultimoI+1);
                    $email=array();
                    $email[]=$ordenemail->COM_OrdenCompra_IdOrdenCompra;
                    $enviar= invCompras::ProveedorCompras($ordenemail->COM_Proveedor_IdProveedor);
		    
                    if($enviar->INV_Proveedor_Email == NULL){
                    //guarda al que no se manda
                        $ordenemail->COM_OrdenCompra_Imprimir=0;
                        $ordenemail->save();
                    	$imprimir[]=$enviar->INV_Proveedor_ID;
                    }else{
						
			$ordenemail->COM_OrdenCompra_Imprimir=1;
			$ordenemail->save();
                        //manda para imprimir a los que se les manda correo, use para agarrar array de proveedores
                        $correo[]= $enviar->INV_Proveedor_ID;
                        //metodo de enviar el correo, 'emailscompra' es el view,  
                        
                    	Mail::later(10,'emailsOrdenCompras', array('email'=>$email) , function ($message) use($enviar){
                        	 $message->subject('Orden de Compra');
                            $message->to($enviar->INV_Proveedor_Email);
                    	});
                         
                    }
                       
                    $ruta = route('Compras.OrdenCompra.index');
                    $imprimir3 = Mensaje::find(2);
                    $imprimir2 = Mensaje::find(3);
                    $mensaje = 'La Orden de Compra'.' '.$imprimir3->GEN_Mensajes_Mensaje;
                    $mensaje2 = 'La Orden de Compra'.' '.$imprimir2->GEN_Mensajes_Mensaje;
                    return View::make('MensajeSolicitud', compact('mensaje', 'mensaje2' ,'ruta', 'imprimir', 'correo'));
                    }else {
            return Redirect::to('/403');
        }
        }
        
        //funciones hechas para autorizar ordenes de compra
         public function ListaOrdenCompra(){
            if(Seguridad::ListarAutorizarOrdenCompra()){
            return View::make('OrdenCompras.AutorizacionOrdenes');
            }else {
            return Redirect::to('/403');
        }
        }
         public function FormAutorizarOrdenCompra(){
            if(Seguridad::ListarAutorizarOrdenCompra()){
            return View::make('OrdenCompras.AutorizarOrdenCompraForm');
            }else {
            return Redirect::to('/403');
        }
        }
        
         public function AutorizandoOrdenCompra(){
            if(Seguridad::detalleAutorizarOrdenCompra()){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;             
            return View::make('OrdenCompras.OrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra));
            }else {
            return Redirect::to('/403');
        }
        }
         public function AutorizarOrden(){
            if(Seguridad::guardarAutorizarOrdenCompra()){
             $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_TransicionEstado_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tran->COM_TrancicionEstado_FechaModificacion=date('Y/m/d H:i:s');
                      $tran->COM_Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Nombre;
                      $tran->COM_TransicionEstado_Activo=0;
                      $tran->update();
                      $ultimo=HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta transicion fue Autorizada';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$tran->COM_EstadoOrdenCompra_IdEstAct;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=4;
                      $historial->save();
                      
                   } 

             }
			 
             Contabilidad::GenerarTransaccionCmp(8,$or->COM_OrdenCompra_Total,$or->COM_Proveedor_IdProveedor);
             //Contabilidad::GenerarTransaccionCmp(9,$or->COM_OrdenCompra_Total,$or->COM_Proveedor_IdProveedor);
			 
             $ruta = route('AutOrdCom');
                    $mensajeBD=Mensaje::find(1);
                    $mensaje = 'La Orden de Compra ha sido Autorizada, '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                    }else {
            return Redirect::to('/403');
        }
        }
        public function cancelarOrden(){
            if(Seguridad::cancelarOrdenCompra()){
            $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_TransicionEstado_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tran->COM_TrancicionEstado_FechaModificacion=date('Y/m/d H:i:s');
                      $tran->COM_Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Nombre;
                      $tran->COM_TransicionEstado_Activo=0;
                      $tran->update();
                      $ultimo=HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta transaccion no fue autorizada por lo que se  Canceló';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$tran->COM_EstadoOrdenCompra_IdEstAct;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=7;
                      $historial->save();
                      $or->Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Nombre;
                      $or->COM_OrdenCompra_FechaModificacion=date('Y/m/d H:i:s');
                      $or->COM_OrdenCompra_Activo=0;
                      $or->update();
                      
                      
                                        } 
             }
              $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(12);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                    }else {
            return Redirect::to('/403');
        }
        }

        //administracion de ordenes de compra
        public function ListarOrdenCompra(){
            if(Seguridad::ListaAdministrarOrdenCompra()){
            return View::make('OrdenCompras.AdministrarOrdenes');
            }else {
            return Redirect::to('/403');
        }
        }
        public function AdministraDetalles(){
            if(Seguridad::AdministrarDetalleOrdenCompra()){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.AdministrarOrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));
            }else {
            return Redirect::to('/403');
        }
        }
        public function AndministrarOC(){
            if(Seguridad::guardarAdministrarOC()){
            $input= Input::all();
            $eact=Input::get('id_actual');
            $eant=Input::get('COM_TransicionEstado_EstadoPrevio');
            $esig=Input::get('COM_TransicionEstado_EstadoPosterior');
            $id_historial=Input::get('id_historial');
            $id=Input::get('id_oc');
            $observacion=Input::get('COM_TransicionEstado_Observacion');
            
            //busco y actualizo el estado de del historial de Orden de Compra
            $historial_actual=  HistorialEstadoOrdenCompra::find($id_historial);
            $historial_actual->COM_TransicionEstado_Activo=0;
            $historial_actual->update();
            $ultimo=HistorialEstadoOrdenCompra::count();
            if(!Input::has('COM_TransicionEstado_Observacion')){
                $Observacion='El usuario Prefirio no Comentar';
            }else{
                $Observacion=Input::get('COM_TransicionEstado_Observacion');
            }
            // en esta seccion creo el nuevo historial y lo agrego segun el caso
            if(Input::get('queHacer')=='TransitarAntes'){
                $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion=$Observacion;
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$eact;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=$eant;
                      $historial->save();
            }else{
                $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion=$Observacion;
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$eact;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=$esig;
                      $historial->save();
            }
          $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(15);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                    }else {
            return Redirect::to('/403');
        }
        }
         public function HistorialOrdenes(){
            if(Seguridad::ListarHistorialOrdenes()){
            return View::make('OrdenCompras.listaHistorialOrdenes');
            }else {
            return Redirect::to('/403');
        }
        }
        public function HistorialOrden(){
            if(Seguridad::detalleHistorialOrden()){
             $input=Input::all();
             $id=Input::get('id');
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->paginate();
            
            return View::make('OrdenCompras.HistorialOrden',array('historial'=>$trans));
            }else {
            return Redirect::to('/403');
        }
        
        }
//Lista las ordenes con plan de pago
         public function ListaPlanes(){
            if(Seguridad::VerPlanPagoOrdenCompra()){
            $ordenPago= COMOrdenPago::all()->lists('COM_OrdenCompra_idOrdenCompra');
            //return var_dump($ordenPago);
            if(sizeof($ordenPago)>0){
            $ordenCompra=OrdenCompra::whereIn('COM_OrdenCompra_IdOrdenCompra',$ordenPago)->paginate();
            return View::make('OrdenCompras.ListaPlanPago',array('Ordenes'=>$ordenCompra));
        }else{
            $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(97);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
            }
            }else {
            return Redirect::to('/403');
        }
        }
        public function DetallePlanPago(){
            if(Seguridad::detallePlanPagoOrdenCompra()){
                       $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.detallePlanPago',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));
            }else {
            return Redirect::to('/403');
        }
        }

//genero pago de orden compra
         public function generarpagoLC(){
            if(Seguridad::ListarPagoOrdenCompra()){
            $ordenPago= COMOrdenPago::all()->lists('COM_OrdenCompra_idOrdenCompra');
            
            $autorizadas= HistorialEstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstAct','=','4')->lists('COM_TransicionEstado_IdOrdenCompra');

            if(sizeof($ordenPago)>0 && sizeof($autorizadas)>0){
                    $ordenCompra= OrdenCompra::whereNotIn('COM_OrdenCompra_IdOrdenCompra',$ordenPago)->wherein('COM_OrdenCompra_idOrdenCompra',$autorizadas)->paginate();
            }else{

                if(sizeof($autorizadas)>0){
                    $ordenCompra= OrdenCompra::wherein('COM_OrdenCompra_idOrdenCompra',$autorizadas)->paginate();
                }else{
                    $ordenCompra= OrdenCompra::where('COM_OrdenCompra_activo','=',0)->paginate();
                }

            }
            return View::make('OrdenCompras.ListaOrdenCompraPago',array('Ordenes'=>$ordenCompra));
            }else {
            return Redirect::to('/403');
        }
        }
        
        public function DetallePago(){
            if(Seguridad::DetallePagoOrdenCompra()){
                       $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.detallePago',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));
            }else {
            return Redirect::to('/403');
        }

        }
        //funcion para calcular fecha
        function calculaFecha($modo,$valor,$fecha_inicio=false){
 
   if($fecha_inicio!=false) {
          $fecha_base = strtotime($fecha_inicio);
   }else {
          $time=time();
          $fecha_actual=date("Y-m-d",$time);
          $fecha_base=strtotime($fecha_actual);
   }
 
   $calculo = strtotime("$valor $modo","$fecha_base");
 
   return date("Y-m-d", $calculo);
 
}
        public function GuardaPago(){
            if(Seguridad::GuardarPagoOrdenPago()){
            $input = Input::all();
            $ordenOC=OrdenCompra::find(Input::get('id_ordenCompra'));
            $fp= DB::table('INV_FormaPago')->where('INV_FormaPago_ID', '=',$ordenOC->COM_OrdenCompra_FormaPago)->first();
            $abonos=$ordenOC->COM_OrdenCompra_Total/$ordenOC->COM_OrdenCompra_CantidadPago;
            
            $fecha2= $this->calculaFecha('days',$ordenOC->COM_OrdenCompra_PeriodoGracia,date('Y-m-d'));
            $ultimo= COMOrdenPago::count();
                $nuevopago=  new COMOrdenPago();
                $nuevopago->COM_OrdenPago_Codigo='COM_OPG_'.($ultimo+1);
                $nuevopago->COM_OrdenCompra_idOrdenCompra= Input::get('id_ordenCompra');
                $nuevopago->COM_OrdenPago_Activo=1;
                $nuevopago->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                $nuevopago->COM_OrdenCompra_FechaCreo= date('Y/m/d H:i:s');
                $nuevopago->COM_OrdenCompra_FechaPagar=$fecha2;
                $nuevopago->COM_OrdenCompra_Monto=$abonos;
                $nuevopago->COM_OrdenCompra_FormaPago=$ordenOC->COM_OrdenCompra_FormaPago;
                $nuevopago->COM_Proveedor_IdProveedor =$ordenOC->COM_Proveedor_IdProveedor;
                $nuevopago->save();
                
               

                $fechaAnterior=$fecha2;
            for( $i=0; $i<($ordenOC->COM_OrdenCompra_CantidadPago-1); $i++){
                $fecha= $this->calculaFecha('days',$fp->INV_FormaPago_DiasCredito,$fechaAnterior);
                $ultimo= COMOrdenPago::count();
                $nuevopago=  new COMOrdenPago();
                $nuevopago->COM_OrdenPago_Codigo='COM_OPG_'.($ultimo+1);
                $nuevopago->COM_OrdenCompra_idOrdenCompra= Input::get('id_ordenCompra');
                $nuevopago->COM_OrdenPago_Activo=1;
                $nuevopago->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                $nuevopago->COM_OrdenCompra_FechaCreo= date('Y/m/d H:i:s');
                $nuevopago->COM_OrdenCompra_FechaPagar=$fecha;
                $nuevopago->COM_OrdenCompra_Monto=$abonos;
                $nuevopago->COM_OrdenCompra_FormaPago=$ordenOC->COM_OrdenCompra_FormaPago;
                $nuevopago->COM_Proveedor_IdProveedor =$ordenOC->COM_Proveedor_IdProveedor;
                $nuevopago->save(); 
                $fechaAnterior=$fecha;               

            }
           
            $ruta = route('generarpagoLC');
                    $mensajeBD = Mensaje::find(14);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                    }else {
            return Redirect::to('/403');
        }
        }

        //search de mazoni

       public function search_Producto(){

        $proveedor=1;
        //Querys de las columnas propias del Producto
        $productos = Producto::where('INV_Producto_Nombre', 'LIKE', '%'.Input::get('search').'%') 
        ->orWhere('INV_Producto_Codigo', '=',  Input::get('search'))
        ->orWhere('INV_Producto_ValorCodigoBarras', '=',  Input::get('search'))
        ->orWhere('INV_Producto_Descripcion', 'LIKE',  '%'.Input::get('search').'%')
        ->get();
        //Querys de las columnas que tiene relacion con la tabla Proveedor
        $queryPoveedor= Proveedor::where('INV_Proveedor_Nombre','LIKE', '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_RepresentanteVentas', 'LIKE',  '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_Direccion', 'LIKE', '%'.Input::get('search').' %')
        ->orWhere('INV_Proveedor_Email', 'LIKE', '%'.Input::get('search').'%')
        ->orWhere('INV_Proveedor_Codigo', '=',  Input::get('search'))
        ->orWhere('INV_Proveedor_Telefono', '=',  Input::get('search'))->get();
        // reviso si trajo datos para decidir si los proceso         
        if(!empty($queryPoveedor)){
            $temp = array();
            $temp1 = array();
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryPoveedor as $qP) {
                array_push($temp, $qP->INV_Proveedor_ID);
                $proveedor=$qP->INV_Proveedor_ID;
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
                $propro = DB::table('INV_Producto_Proveedor')->wherein('INV_Proveedor_ID',$temp)->get();
            foreach ($propro as $pro) {
                array_push($temp1, $pro->INV_Producto_ID);   
            }
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            $productos=Producto::wherein('INV_Producto_ID',$temp1)->get();
            }
        }
        $inventario=$productos;
        //reemplazo de variable a enviar a la vista
         return View::make('OrdenCompras.NuevaOrdenCompraSinCotizacion', array('inventario' =>$inventario , 'proveedor'=>$proveedor));
        
    }

    //search para Cotizaciones
    public function search_cotizaciones(){

        $proveedor=1;
        $Cotizaciones1 = array();
        //Querys de las columnas propias del Producto
        $Cotizaciones = cotizacion::where('COM_Cotizacion_IdCotizacion', '=', Input::get('search')) 
        ->orWhere('COM_Cotizacion_Codigo', '=',  Input::get('search'))
        ->orWhere('COM_Cotizacion_NumeroCotizacion', '=',  Input::get('search'))
        ->get();
        
        //Querys de las columnas que tiene relacion con la tabla Proveedor
            $queryPoveedor= Proveedor::where('INV_Proveedor_Nombre','LIKE', '%'.Input::get('search').'%')
            ->orWhere('INV_Proveedor_RepresentanteVentas', 'LIKE',  '%'.Input::get('search').'%')
            ->orWhere('INV_Proveedor_Direccion', 'LIKE', '%'.Input::get('search').' %')
            ->orWhere('INV_Proveedor_Email', 'LIKE', '%'.Input::get('search').'%')
            ->orWhere('INV_Proveedor_Codigo', '=',  Input::get('search'))
            ->orWhere('INV_Proveedor_Telefono', '=',  Input::get('search'))->get();
        
        //reviso los campos locales de busqueda de la cotizacion
         
         $campos = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','COM_COT_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1);
        if ($campos) {
                        //return $val;
            $noListas = $campos->where('GEN_CampoLocal_Tipo','<>','LIST')->lists('GEN_CampoLocal_ID');
            $listas = DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC_%')->where('GEN_CampoLocal_ParametroBusqueda',1)->where('GEN_CampoLocal_Activo',1)->where('GEN_CampoLocal_Tipo','LIKE','%LIST%')->lists('GEN_CampoLocal_ID');

            if ($listas) {
                $valorLista = DB::table('GEN_CampoLocalLista')->whereIn('GEN_CampoLocal_GEN_CampoLocal_ID',$listas)->where('GEN_CampoLocalLista_Valor','LIKE', '%'.Input::get('search').'%')->lists('GEN_CampoLocalLista_ID');
                if($valorLista) {
                    $Cotizaciones1 = array_merge($Cotizaciones1,DB::table('COM_ValorCampoLocal')->whereIn('COM_CampoLocal_IdCampoLocal',$listas)->whereIn('COM_ValorCampoLocal_Valor',$valorLista)->lists('COM_Cotizacion_IdCotizacion'));
                }
            }
            if ($noListas) {
                $Cotizaciones1 = array_merge($Cotizaciones1,DB::table('COM_ValorCampoLocal')->whereIn('COM_CampoLocal_IdCampoLocal',$noListas)->where('COM_ValorCampoLocal_Valor','LIKE', '%'.Input::get('search').'%')->lists('COM_Cotizacion_IdCotizacion'));
                                
            }
                        if($Cotizaciones1){
                            $Cotizaciones=  Cotizacion::wherein('COM_Cotizacion_IdCotizacion',$Cotizaciones1)->get();

                        }
                        
                        
        }

        // reviso si trajo datos para decidir si los proceso         
        if(!empty($queryPoveedor)){
            $temp = array();
            $temp1 = array();
            //hago la primer revision para saber que productos distribuye ese proveedor
            foreach ($queryPoveedor as $qP) {
                array_push($temp, $qP->INV_Proveedor_ID);
                $proveedor=$qP->INV_Proveedor_ID;
            }
            // ahora extraigo esos productos de ese proveedor especifico
            if (sizeof($temp)>0) {
                $Cotizaciones=Cotizacion::wherein('COM_Proveedor_IdProveedor',$temp)->get();
                //$propro = DB::table('INV_Producto_Proveedor')->wherein('INV_Proveedor_ID',$temp)->get();
            //foreach ($propro as $pro) {
              //  array_push($temp1, $pro->INV_Producto_ID);   
            //}
            //remplazo el arreglo origian con el nuevo de los productos que pertenecen a un proveedor en especial
            //$productos=Producto::wherein('INV_Producto_ID',$temp1)->get();
            }
        }
        //$inventario=$productos;
        //reemplazo de variable a enviar a la vista
        return View::make('OrdenCompras.NuevaOrdenCompraConCotizacion',array('cotizaciones'=> $Cotizaciones));
        
    }
        
 }
?>