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
            
            return View::make('DevolucionCompra.DevolucionCompraForm');
        }
        public function ListaDevolucion(){
            return var_dump(getProductosRechazados());
            $Ordenes= OrdenCompra::all();
            return View::make('DevolucionCompra.ListaDevoluciones',array('ordenes'=> $Ordenes));
        }
        
 }
?>