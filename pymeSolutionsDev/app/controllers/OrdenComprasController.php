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
    
        //funciones hechas para crear una orden de compra sin cotizacion
        public function OrdenComprasnCotizacion(){
            $inventario= invCompras::CualquierProducto();
            return View::make('OrdenCompras.NuevaOrdenCompraSinCotizacion',array('inventario'=>$inventario,'proveedor'=> 1));
        }
         public function FormOrdenComprasnCotizacion(){
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
                 return 'no se puede crear una orden de Compra';
             }else{
                $products=Producto::wherein('INV_Producto_ID',$productos)->get();
             }
             
            
            return View::make('OrdenCompras.OrdenCompraForm',array('proveedor'=>$proveedor ,'productos'=>$products));
        }
        
//funcion para guardar la orden de compra sin cotizacion
        public function guardarOCsnCOT(){
             $input=Input::all();
             $contador=0;
             $contador2=0;
             $proveedor=Input::get('COM_Proveedor_IdProveedor');
             $productos=array();
             
            
                                        
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
             $OrdenCompras->COM_Usuario_IdUsuarioCreo=1;
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
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
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
                  $detalle1->COM_Usuario_idUsuarioCreo=1;
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
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion='Esta es la transicion creada al inicio';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=1;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=3;
                      $historial->COM_TrancicionEstado_FechaCreacion=date('Y-m-d');
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->save();
					  
                       
                    $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(12);
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                

        }
        
        
        
        
        //funciones hechas para crear una orden de Compra Con Cotizacion
        public function OrdenCompracnCotizacion(){
             $cotizaciones = Cotizacion::where('COM_Cotizacion_Vigente','=',1)->get();
            return View::make('OrdenCompras.NuevaOrdenCompraConCotizacion',array('cotizaciones'=> $cotizaciones));
        }
         public function ComparaCotizaciones(){
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
        }
        public function FormOrdenCompracnCotizacion(){
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
        }

         public function guardarOCcnCOT(){
             $input=Input::all();
             $contador=0;
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
             $OrdenCompras->COM_Usuario_IdUsuarioCreo=1;
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
                        $valorcampolocal->COM_Usuario_idUsuarioCreo=1;
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
                  $detalle->COM_Usuario_idUsuarioCreo=1;
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
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta es la transicion creada al inicio';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=1;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=3;
                      $historial->COM_TrancicionEstado_FechaCreacion=date('Y-m-d');
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->save();
                      
            $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(12);
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
        }
        
        //funciones hechas para autorizar ordenes de compra
         public function ListaOrdenCompra(){
            return View::make('OrdenCompras.AutorizacionOrdenes');
        }
         public function FormAutorizarOrdenCompra(){
            return View::make('OrdenCompras.AutorizarOrdenCompraForm');
        }
        
         public function AutorizandoOrdenCompra(){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;             
            return View::make('OrdenCompras.OrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra));
        }
         public function AutorizarOrden(){
             $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_TransicionEstado_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tran->COM_TransicionEstado_Activo=0;
                      $tran->update();
                      $ultimo=HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta transicion fue Autorizada';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$tran->COM_EstadoOrdenCompra_IdEstAct;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=4;
                      $historial->save();
                      
                   } 
             }
			 
             Contabilidad::GenerarTransaccionCmp(8,$or->COM_OrdenCompra_Total,$or->COM_Proveedor_IdProveedor);
             Contabilidad::GenerarTransaccionCmp(9,$or->COM_OrdenCompra_Total,$or->COM_Proveedor_IdProveedor);
			 
             $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(1);;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
        }
        public function cancelarOrden(){
            $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_TransicionEstado_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tran->COM_TransicionEstado_Activo=0;
                      $tran->update();
                      $ultimo=HistorialEstadoOrdenCompra::count();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo='COM_HOC_'.($ultimo+1);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_TransicionEstado_IdOrdenCompra=$id;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion='Esta transaccion no fue autorizada por lo que se  Canceló';
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$tran->COM_EstadoOrdenCompra_IdEstAct;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=7;
                      $historial->save();
                      $or->COM_OrdenCompra_Activo=0;
                      $or->update();
                      
                      
                                        } 
             }
              $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(12);
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
        }

        //administracion de ordenes de compra
        public function ListarOrdenCompra(){
            return View::make('OrdenCompras.AdministrarOrdenes');
        }
        public function AdministraDetalles(){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.AdministrarOrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));
        }
        public function AndministrarOC(){
            
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
                      $historial->COM_Usuario_idUsuarioCreo=1;
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
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d H:i:s');
                      $historial->COM_TransicionEstado_Observacion=$Observacion;
                      $historial->COM_EstadoOrdenCompra_IdEstAnt=$eact;
                      $historial->COM_EstadoOrdenCompra_IdEstAct=$esig;
                      $historial->save();
            }
          $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(15);;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
        }
         public function HistorialOrdenes(){
            return View::make('OrdenCompras.listaHistorialOrdenes');
        }
        public function HistorialOrden(){
             $input=Input::all();
             $id=Input::get('id');
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->paginate();
            
            return View::make('OrdenCompras.HistorialOrden',array('historial'=>$trans));
        
        }
//Lista las ordenes con plan de pago
         public function ListaPlanes(){
            $ordenPago= COMOrdenPago::all()->lists('COM_OrdenCompra_idOrdenCompra');
            //return var_dump($ordenPago);
            if(sizeof($ordenPago)>0){
            $ordenCompra=OrdenCompra::whereIn('COM_OrdenCompra_IdOrdenCompra',$ordenPago)->get();
            return View::make('OrdenCompras.ListaPlanPago',array('Ordenes'=>$ordenCompra));
        }else{
            return 'no hay planes de pagos';
            }
        }
        public function DetallePlanPago(){
                       $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.detallePlanPago',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));

        }

//genero pago de orden compra
         public function generarpagoLC(){
            $ordenPago= COMOrdenPago::all()->lists('COM_OrdenCompra_idOrdenCompra');
            //return var_dump($ordenPago);
            if(sizeof($ordenPago)>0){
            $ordenCompra=OrdenCompra::whereNotIn('COM_OrdenCompra_IdOrdenCompra',$ordenPago)->get();
        }else{
            $ordenCompra= OrdenCompra::all();
        }
            return View::make('OrdenCompras.ListaOrdenCompraPago',array('Ordenes'=>$ordenCompra));
        }
        
        public function DetallePago(){
                       $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$id)->get();
             
            return View::make('OrdenCompras.detallePago',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans));

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
                $nuevopago->COM_Usuario_idUsuarioCreo=1;
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
                $nuevopago->COM_Usuario_idUsuarioCreo=1;
                $nuevopago->COM_OrdenCompra_FechaCreo= date('Y/m/d H:i:s');
                $nuevopago->COM_OrdenCompra_FechaPagar=$fecha;
                $nuevopago->COM_OrdenCompra_Monto=$abonos;
                $nuevopago->COM_OrdenCompra_FormaPago=$ordenOC->COM_OrdenCompra_FormaPago;
                $nuevopago->COM_Proveedor_IdProveedor =$ordenOC->COM_Proveedor_IdProveedor;
                $nuevopago->save(); 
                $fechaAnterior=$fecha;               

            }
           
            $ruta = route('ListaOrdenes');
                    $mensaje = Mensaje::find(14);
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
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