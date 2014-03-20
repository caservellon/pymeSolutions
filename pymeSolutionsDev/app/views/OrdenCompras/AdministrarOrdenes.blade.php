@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Autorizar Orden de Compra por Cotizacion<small></small></h3>
      <div class="pull-right">
        <a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
   
    <div class=" col-lg-12">
			<div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    <input type="Text"  style="width: 550px">
                                </div>
                                
			</div>
			<div class="col-md-3">
				<input type="button" value="Buscar" id="bpderecho" class="btn btn-default btn-block col-md-6" >  
				<input type="button" value="Seleccionar" id="bpderecho" class="btn btn-default btn-block col-md-6">
			</div>
    </div>
    
	<div class="col-md-9" style="overflow:auto; height: 350px">
            <form action="" method=GET>
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
                      
                      <?php $ordenes= OrdenCompra::where('COM_OrdenCompra_Activo','=',1)->lists('COM_OrdenCompra_IdOrdenCompra','COM_OrdenCompra_Codigo','COM_OrdenCompra_FechaEmision','COM_Proveedor_IdProveedor');
                            
                      ?>
                      @foreach($ordenes as $orden)
                      <?php $or=  OrdenCompra::find($orden);
                            $proveedor= Proveedor::find($or->COM_Proveedor_IdProveedor);
                            $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
                                
                      ?>
                        <tr>
                            
                            <td>{{$or->COM_OrdenCompra_Codigo}}</td>
                            <td>{{$proveedor->INV_Proveedor_Nombre}}</td>
                            <td>{{$or->COM_OrdenCompra_FechaEmision}}</td>
                            @foreach($trans as $tran)
                            
                            <?php 
                            //echo var_dump($tran);
                            
                            if($tran->COM_OrdenCompra_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                                        $tratra= COMOrdenCompraTransicionEstado::find($tran->COM_OrdenCompra_TransicionEstado_Id);
                                        $t= COM_EstadoOrdenCompra::find($tratra->COM_OrdenCompra_TransicionEstado_EstadoActual);
                                        ?><td>{{$t->COM_EstadoOrdenCompra_Nombre}}</td><?php
                                        } ?>
                                        
                            @endforeach
                            <td><a href="{{ route('AdministraOrCOm', array('id'=>$or->COM_OrdenCompra_IdOrdenCompra,'id_ea'=>$tratra->COM_OrdenCompra_TransicionEstado_EstadoActual)) }}" class="btn btn-info">Administrar</a></td>
                        </tr> 
                     @endforeach
              </tbody>
            </table>
          </div>
        </div>
      
			</form>
</div>
@stop