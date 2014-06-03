<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class DevolucionCompraController extends BaseController {

    /**
     * OrdenCompra Repository
     *
     * @var OrdenCompra
     */
    protected $DevolucionCompra;
        //reglas de validacion



    public function __construct(DevolucionCompra $DevolucionCompra)
    {
        $this->DevolucionCompra = $DevolucionCompra;
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
    public function DevolucionCompraDetalle(){
            $ID_Or=Input::get('id');
            $orden=OrdenCompra::find($ID_Or);
            $proveedor=$orden->COM_Proveedor_IdProveedor;
            $isv=$orden->COM_OrdenCompra_ISV;
            $pagos=COMOrdenPago::where('COM_OrdenCompra_idOrdenCompra','=',$ID_Or)->get();
            $Saldo=0;
            foreach ($pagos as $Elemento) {
                if($Elemento->COM_OrdenPago_Activo==1){
                    $Saldo+=$Elemento->COM_OrdenCompra_Monto;
                }
            }
            $productos = array();
            $CanProd=array();
            foreach (invCompras::getOrdenRechazada($ID_Or) as $Elemento) {
                array_push($productos, $Elemento->INV_ProductoRechazado_IDProducto);
                array_push($CanProd, $Elemento->INV_ProductoRechazado_Cantidad);
            }
            $detalle=COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$ID_Or)->wherein('COM_Producto_idProducto',$productos)->get();
            
           
            
            return View::make('DevolucionCompra.DevolucionCompraForm',array('proveedor' => $proveedor, 'detalle'=>$detalle, 'isv'=>$isv , 'id_cot'=>$ID_Or, 'cantidades'=>$CanProd,'saldo'=>$Saldo));
        }
        public function ListaDevolucion(){
            $rechazo=invCompras::getProductosRechazados();
            $ordenes=array();
            foreach ($rechazo as $Elemento) {
                array_push($ordenes, $Elemento->INV_ProductoRechazado_IDOrdenCompra);
                echo $Elemento->INV_ProductoRechazado_IDOrdenCompra;
            }
           if(sizeof($ordenes)>0){
                $Ordenes= OrdenCompra::wherein('COM_OrdenCompra_IdOrdenCompra',$ordenes)->get();
            return View::make('DevolucionCompra.ListaDevoluciones',array('ordenes'=> $Ordenes));
           }
            
            
        }
          public function guardaDevolucion(){
//Recibo los datos y los Compruebo
            $input=Input::all();
            $contador=0;
//selecciono los Datos que eviaron en el formulario
            $idproveedor= Input::get('COM_Proveedor_IdProveedor');
            $id_Orden= Input::get('Id_Orden');
            $Orden= OrdenCompra::find($id_Orden);
            $isv=Input::get('isv');
            $total=Input::get('totalG');
            $saldo=Input::get('saldo');
//Creado el header de la devolucion
            $ultimo= DevolucionCompra::count();
            $devolucion= new DevolucionCompra();
            $devolucion->COM_DevolucionCompra_Codigo='COM_DOC_'.($ultimo+1);
            $devolucion->COM_DevolucionCompra_FechaEmision=date('Y/m/d H:i:s');
            $devolucion->COM_DevolucionCompra_Activo=1;
            $devolucion->COM_DevolucionCompra_Total=$total;
            $devolucion->COM_DevolucionCompra_UsuarioCreo=1;
            $devolucion->COM_OrdenCompra_COM_OrdenCompra_IdOrdenCompra=$id_Orden;
            $devolucion->COM_Proveedor_IdProveedor=$idproveedor;
            $devolucion->save();
            $ultOrd= DevolucionCompra::count();
//Recibiendo el Detalle
            foreach($input as $Elemento){
                if(Input::has('COM_Producto_idProducto'.$contador)){
                    $ultdet= DetalleDevolucionCompra::count();
                     $detalle1=new DetalleDevolucionCompra();
                     $detalle1->COM_DetalleDevolucionCompra_Codigo='COM_DDOC_'.($ultdet+1);
                     $detalle1->COM_Usuario_idUsuarioCreo=1;
                     $detalle1->COM_DetalleDevolucionCompra_FechaCreo=date('Y/m/d H:i:s');
                     $detalle1->COM_DevolucionCompra_ID=$ultOrd;
                     $detalle1->COM_DetalleDevolucionCompra_Cantidad=Input::get('COM_DetalleOrdenCompra_Cantidad'.$contador);
                     $detalle1->COM_DetalleDevolucionCompra_PrecioUnitario=Input::get('COM_DetalleOrdenCompra_PrecioUnitario'.$contador);
                     $detalle1->save();
                }
                $contador++;
            }
           Contabilidad::Devolucion($total,$Orden->COM_Proveedor_IdProveedor); $Phacer=COMOrdenPago::where('COM_OrdenCompra_idOrdenCompra','=',$id_Orden)->where('COM_OrdenPago_Activo','=',1)->get();
            $tamaño= sizeof($Phacer);
            if($saldo > $total){
                foreach ($Phacer as $Elemento) {
                     $ultimo= COMOrdenPago::count();
                   $nuevopago=  new COMOrdenPago();
                $nuevopago->COM_OrdenPago_Codigo='COM_OPG_'.($ultimo+1);
                $nuevopago->COM_OrdenCompra_idOrdenCompra= $id_Orden;
                $nuevopago->COM_OrdenPago_Activo=1;
                $nuevopago->COM_Usuario_idUsuarioCreo=1;
                $nuevopago->COM_OrdenCompra_FechaCreo= date('Y/m/d H:i:s');
                $nuevopago->COM_OrdenCompra_FechaPagar=$Elemento->COM_OrdenCompra_FechaPagar;
                $nuevopago->COM_OrdenCompra_Monto=(($saldo-$total)/$tamaño);
                $nuevopago->COM_OrdenCompra_FormaPago=$Orden->COM_OrdenCompra_FormaPago;
                $nuevopago->COM_Proveedor_IdProveedor =$Orden->COM_Proveedor_IdProveedor;
                $Elemento->COM_OrdenPago_Activo=0;
                $Elemento->update();
                $nuevopago->save();
                   
                }
                
                 $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(14);
                    $mensaje= 'La Devolucion  '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
            }else{
                 foreach ($Phacer as $Elemento) {
                     $Elemento->COM_OrdenPago_Activo=0;
                        $Elemento->update();
                 }
                $ultimod=DevolucionCompra::count();
                $reembolso= new ReembolsoDevolucionCompra();
                $reembolso->COM_ReembosoDevolucionCompras_Activo=1;
                $reembolso->COM_ReembosoDevolucionCompras_FechaCreacion=date('Y/m/d H:i:s');
                $reembolso->COM_ReembosoDevolucionCompras_UsuarioCreo=1;
                $reembolso->COM_ReembosoDevolucionCompras_Monto=($total-$saldo);
                $reembolso->COM_ReembosoDevolucionCompras_Proveedor=$Orden->COM_Proveedor_IdProveedor;
                $reembolso->COM_DevolucionCompra_COM_DevolucionCompra_ID=$ultimod;
                $reembolso->save();
              $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(14);
                    $mensaje= 'La Devolucion  '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));   
            }if($saldo = $total){
                 $ruta = route('ListaOrdenes');
                    $mensajeBD = Mensaje::find(14);
                    $mensaje= 'La Devolucion  '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
            }
            
        }
        
 }
?>