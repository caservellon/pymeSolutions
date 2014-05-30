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
            $productos = array();
            $CanProd=array();
            foreach (invCompras::getOrdenRechazada($ID_Or) as $Elemento) {
                array_push($productos, $Elemento->INV_ProductoRechazado_IDProducto);
                array_push($CanProd, $Elemento->INV_ProductoRechazado_Cantidad);
            }
            $detalle=COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=',$ID_Or)->wherein('COM_Producto_idProducto',$productos)->get();
            
           
            
            return View::make('DevolucionCompra.DevolucionCompraForm',array('proveedor' => $proveedor, 'detalle'=>$detalle, 'isv'=>$isv , 'id_cot'=>$ID_Or, 'cantidades'=>$CanProd));
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
            $isv=Input::get('isv');
            $total=Input::get('totalG');
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
            return var_dump($input);
            
        }
        
 }
?>