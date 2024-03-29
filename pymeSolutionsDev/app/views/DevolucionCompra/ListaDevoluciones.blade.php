@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Lista de Devoluciones por Compras<small></small></h3>
      <div class="pull-right">
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>
<div class="row">
   
    
    
  <div class="col-md-9" style="overflow:auto; height: 350px">
            
        <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Proveedor</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
                  <tbody >
                     <?php 
                     //$autorizadas= HistorialEstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstAct','=',3)->where('COM_TransicionEstado_Activo','=',1)->lists('COM_TransicionEstado_IdOrdenCompra');
                     //$ordenes= OrdenCompra::whereIn('COM_OrdenCompra_IdOrdenCompra',$autorizadas)->lists('COM_OrdenCompra_IdOrdenCompra','COM_OrdenCompra_Codigo','COM_OrdenCompra_FechaEmision','COM_Proveedor_IdProveedor');      
                      ?>
                      @foreach($ordenes as $orden)
                      <?php //$or=  OrdenCompra::find($orden);
                            $proveedor= Proveedor::find($orden->COM_Proveedor_IdProveedor);
                            //$trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
                      ?>                      
                        <tr>    
                            <td>{{$orden->COM_OrdenCompra_Codigo}}</td>
                            <td>{{$proveedor->INV_Proveedor_Nombre}}</td>
                            <td>{{$orden->COM_OrdenCompra_FechaEmision}}</td>
                            <?/*@foreach($trans as $tran)
                             
                            if($tran->COM_OrdenCompra_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                                        $t= COM_EstadoOrdenCompra::find($tran->COM_EstadoOrdenCompra_IdEstAct);
                                        ?><td>{{$t->COM_EstadoOrdenCompra_Nombre}}</td><?php
                                        } 
                            @endforeach*/?>
                            <td><a href="{{ route('DevolucionCompra', array('id'=>$orden->COM_OrdenCompra_IdOrdenCompra)) }}" class="btn btn-info">ver Detalle</a></td>
                        </tr> 
                        
                     @endforeach
              </tbody>
            </table>
          </div>
        </div>
</div>
@stop