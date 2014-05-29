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
        
 }
?>